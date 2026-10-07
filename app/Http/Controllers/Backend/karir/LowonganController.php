<?php

namespace App\Http\Controllers\Backend\karir;

use App\Enums\Karir\StatusLowongan;
use App\Enums\Karir\TipeKerja;
use App\Http\Controllers\Controller;
use App\Http\Requests\Karir\LowonganRequest;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class LowonganController extends Controller
{
    public function index()
    {
        return view('backend.karir.lowongan.index', [
            'sidebar'   => 'karir',
            'page_name' => 'Lowongan',
        ]);
    }

    public function getData()
    {
        $query = Lowongan::query()->withCount('lamarans')->latest();

        $user      = auth()->user();
        // $canUpdate = $user->can('update-lowongan');
        $canDelete = $user->can('delete-lowongan');

        return DataTables::eloquent($query)
            ->addIndexColumn()
            ->editColumn('judul', fn ($row) =>
                '<div class="fw-semibold">' . e($row->judul) . '</div>
                 <small class="text-muted">' . e($row->departemen) . '</small>')
            ->editColumn('tipe_kerja', fn ($row) => e(Str::headline($row->tipe_kerja?->name)))
            ->editColumn('status', function ($row) {
                $class = match ($row->status) {
                    StatusLowongan::Aktif   => 'bg-label-success',
                    StatusLowongan::Ditutup => 'bg-label-secondary',
                    default                 => 'bg-label-warning',
                };

                return '<span class="badge ' . $class . '">' . e(Str::headline($row->status?->name)) . '</span>';
            })
            ->editColumn('lamarans_count', fn ($row) =>
                '<span class="badge bg-label-primary">' . $row->lamarans_count . '</span>')
            ->editColumn('ditutup_at', fn ($row) => $row->ditutup_at?->format('d M Y') ?? '-')
            ->addColumn('action', function ($row)  {
                $html = '<div class="d-flex gap-1">';

                    $html .= '<a href="' . route('admin.karir.lowongan.edit', $row) . '"
                                class="btn btn-sm btn-warning" title="Edit"><i class="bx bx-edit"></i></a>';

                    $html .= '<button type="button" class="btn btn-sm btn-danger btn-delete"
                                data-url="' . route('admin.karir.lowongan.destroy', $row) . '"
                                data-name="' . e($row->judul) . '" title="Hapus"><i class="bx bx-trash"></i></button>';
                

                return $html . '</div>';
            })
            ->rawColumns(['judul', 'status', 'lamarans_count', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('backend.karir.lowongan.create', $this->formData(new Lowongan()));
    }

    public function store(LowonganRequest $request)
    {
        Lowongan::create($this->prepareData($request->validated()));

        return redirect()
            ->route('admin.karir.lowongan.index')
            ->with('success', 'Lowongan berhasil ditambahkan.');
    }

    public function edit(Lowongan $lowongan)
    {
        return view('backend.karir.lowongan.edit', $this->formData($lowongan));
    }

    public function update(LowonganRequest $request, Lowongan $lowongan)
    {
        $lowongan->update($this->prepareData($request->validated(), $lowongan));

        return redirect()
            ->route('admin.karir.lowongan.index')
            ->with('success', 'Lowongan berhasil diperbarui.');
    }

    public function destroy(Request $request, Lowongan $lowongan)
    {
        $lowongan->delete();

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Lowongan berhasil dihapus.']);
        }

        return redirect()
            ->route('admin.karir.lowongan.index')
            ->with('success', 'Lowongan berhasil dihapus.');
    }

    private function formData(Lowongan $lowongan): array
    {
        return [
            'sidebar'      => 'karir',
            'page_name'    => 'Lowongan',
            'lowongan'     => $lowongan,
            'departemen'   => Lowongan::distinct()->orderBy('departemen')->pluck('departemen'),
            'lokasi'       => Lowongan::distinct()->orderBy('lokasi')->pluck('lokasi'),
            'tipeKerja'    => TipeKerja::cases(),
            'statuses'     => StatusLowongan::cases(),
            'benefitIcons' => ['wallet', 'shield', 'award', 'chart', 'users'],
        ];
    }

    private function prepareData(array $data, ?Lowongan $lowongan = null): array
    {
        if (empty($data['slug'])) {
            unset($data['slug']);
        }

        if (($data['status'] ?? null) === StatusLowongan::Aktif->value && empty($data['published_at'])) {
            $data['published_at'] = $lowongan?->published_at ?? now();
        }

        return $data;
    }
}