<?php

namespace App\Http\Controllers\Front_End\PreRegister;

use App\Http\Controllers\Controller;
use App\Http\Requests\PreRegisterRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Utils;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class PreRegisterController extends Controller
{
    public function index()
    {

        $data = [
            'page_name' => 'Preregister',
            'navlight' => true,
            'slotJam' => PreRegisterRequest::SLOT_JAM,
        ];
        return view('front-end.page.preregister.index', $data);
    }

    /**
     * Teruskan pengajuan pre-register ke API billing.
     */
    public function store(PreRegisterRequest $request, Client $client): JsonResponse
    {
        // Honeypot: field tersembunyi ini hanya terisi oleh bot.
        if ($request->filled('website')) {
            Log::warning('PreRegister: diabaikan karena honeypot terisi (kemungkinan bot)');

            return $this->berhasil();
        }

        $mulai = microtime(true);
        $durasi = fn () => (int) round((microtime(true) - $mulai) * 1000);

        Log::info('PreRegister: mengirim ke API', [
            'ktp_kb' => (int) ceil($request->file('ktp')->getSize() / 1024),
            'foto_rumah_kb' => (int) ceil($request->file('foto_rumah')->getSize() / 1024),
        ]);

        try {
            $response = $client->post(config('app.base_url_api'), [
                'headers' => ['Accept' => 'application/json'],
                'multipart' => $this->multipart($request),
                'connect_timeout' => 10,
                'timeout' => 60,
                'http_errors' => false,
                // Redirect pada POST akan berubah jadi GET dan terlihat seolah sukses.
                'allow_redirects' => false,
            ]);
        } catch (GuzzleException $e) {
            Log::error('PreRegister: gagal terhubung ke API', [
                'error' => $e->getMessage(),
                'durasi_ms' => $durasi(),
            ]);

            return $this->gagal('Tidak dapat terhubung ke server. Silakan coba kembali.');
        }

        $status = $response->getStatusCode();

        if ($status >= 200 && $status < 300) {
            Log::info('PreRegister: berhasil', ['status' => $status, 'durasi_ms' => $durasi()]);

            return $this->berhasil();
        }

        $result = json_decode((string) $response->getBody(), true);

        if ($status === 422 && !empty($result['errors'])) {
            Log::warning('PreRegister: validasi ditolak API', [
                'errors' => $result['errors'],
                'durasi_ms' => $durasi(),
            ]);

            return response()->json(['message' => 'Periksa kembali isian Anda.', 'errors' => $result['errors']], 422);
        }

        // Data pemohon (NIK, dll.) sengaja tidak ikut dicatat di log.
        Log::error('PreRegister: API menolak pengajuan', [
            'status' => $status,
            'message' => $result['message'] ?? null,
            'durasi_ms' => $durasi(),
        ]);

        return $this->gagal('Terjadi kesalahan saat mengirim pengajuan. Silakan coba kembali.');
    }

    /**
     * Susun data tervalidasi menjadi body multipart/form-data.
     */
    private function multipart(PreRegisterRequest $request): array
    {
        $parts = [];

        foreach ($request->safe()->except(['ktp', 'foto_rumah', 'terms']) as $name => $value) {
            $parts[] = ['name' => $name, 'contents' => (string) $value];
        }

        foreach (['ktp', 'foto_rumah'] as $name) {
            $file = $request->file($name);

            $parts[] = [
                'name' => $name,
                'contents' => Utils::tryFopen($file->getRealPath(), 'r'),
                'filename' => $file->getClientOriginalName(),
                'headers' => ['Content-Type' => $file->getMimeType()],
            ];
        }

        return $parts;
    }

    private function berhasil(): JsonResponse
    {
        return response()->json([
            'message' => 'Pendaftaran Pre-Register berhasil dikirim! Tim kami akan menghubungi Anda.',
        ]);
    }

    private function gagal(string $pesan): JsonResponse
    {
        return response()->json(['message' => $pesan], 502);
    }
}
