<?php

namespace App\Http\Controllers\Backend\Packet;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaketRequest;
use App\Models\CategoryPacket;
use App\Models\packet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Yajra\DataTables\DataTables;

class PacketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'sidebar' => 'packet',
            'page_name' => 'Daftar Paket',
        ];
        return view('backend.packet.index', $data);
    }

    public function getData()
    {
        $query = packet::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.packet.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            $button .= ' <a href="' . route('backend.deskription', ['id' => $query->id]) . '" class="btn btn-sm btn-primary action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Lihat Data"><i
                                                        class="fas fa-eye"></i></a>';
            $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.packet.delete', ['id' => $query->id]) . '"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->addColumn('is_active', function ($query) {
            $active = '';
            $query->is_active == 1 ? $active = '<span class="badge bg-label-primary">Aktif</span>' : $active = '<span class="badge bg-label-warning">Tidak</span>';
            return $active;
        })->addColumn('best_seller', function ($query) {
            $best = '';
            $query->best_seller == 1 ? $best = '<span class="badge bg-label-primary">Ya</span>' : $best = '<span class="badge bg-label-warning">Tidak</span>';
            return $best;
        })->addColumn('price', function ($query) {
            $price = 'Rp. ';
            return $price . ' ' . Number::format($query->price);
        })->editColumn('category_id', function ($query) {
            return $query->categori->name;
        })->rawColumns(['action', 'is_active', 'best_seller', 'category_id'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'packet',
            'page_name' => 'Tambah Daftar Paket',
            'packet' => CategoryPacket::all()
        ];
        return view('backend.packet.addpacket', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaketRequest $request)
    {
        $request->validated();
        packet::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'is_active' => $request->is_active,
            'best_seller' => $request->best_seller,
            'duration' => $request->duration,
            'speed' => $request->speed
        ]);

        return redirect()->route('backend.packet')->with(['success' => 'Berhasil Menambahkan Paket!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(packet $packet, string $id)
    {
        $data = [
            'sidebar' => 'packet',
            'page_name' => 'Edit Daftar Paket',
            'categorypacket' => CategoryPacket::all(),
            'paket' => $packet->find($id)
        ];
        return view('backend.packet.editpacket', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(PaketRequest $request, string $id)
    {
        $request->validated();
        $paket = packet::findOrFail($id);
        $paket->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'best_seller' => $request->best_seller,
            'is_active' => $request->is_active,
            'duration' => $request->duration,
            'speed' => $request->speed
        ]);

        return redirect()->route('backend.packet')->with('success', 'Berhasil Update Paket');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            packet::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Data Paket Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Data Paket Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
