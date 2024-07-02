<?php

namespace App\Http\Controllers\Backend\Packet;

use App\Http\Controllers\Controller;
use App\Models\packet;
use Illuminate\Http\Request;
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
            $button .= ' <a href="' . route('dashboard') . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';

            $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('dashboard') . '"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sidebar' => 'packet',
            'page_name' => 'Tambah Daftar Paket',
        ];
        return view('backend.packet.addpacket', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
