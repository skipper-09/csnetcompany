<?php

namespace App\Http\Controllers\Backend\Promo;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromoPaketRequest;
use App\Models\packet;
use App\Models\Promo;
use App\Models\promo_paket;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Yajra\DataTables\DataTables;

class PromoPacketController extends Controller
{
    public function index()
    {
        $data = [
            'sidebar' => 'Promo',
            'page_name' => 'Promo Paket',
        ];
        return view('backend.promo.promo_packet.index', $data);
    }



    public function getData()
    {
        $query = promo_paket::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.promo_paket.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.promo_paket.delete', ['id' => $query->id]) . '"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->addColumn('status', function ($query) {
            $active = '';
            $query->status == 1 ? $active = '<span class="badge bg-label-primary">Aktif</span>' : $active = '<span class="badge bg-label-warning">Tidak</span>';
            return $active;
        })->editColumn('promotion_id', function ($query) {
            return $query->promo->name;
        })->editColumn('packet_id', function ($query) {
            return $query->paket->name;
        })->rawColumns(['action', 'status', 'promotion_id', 'packet_id'])->make(true);
    }



    public function create()
    {
        $data = [
            'sidebar' => 'Promo',
            'page_name' => 'Promo Paket',
            'promo' => Promo::where('is_active', true)->get(),
            'paket' => packet::where('category_id', 3)->get(),
        ];
        return view('backend.promo.promo_packet.add', $data);
    }


    public function store(PromoPaketRequest $request)
    {
        try {

            $request->validated();
            $nominal = 0;
            $diskon = 0;
            $paket = packet::find($request->packet_id);
            if ($request->discount_type == 'percent') {
                $diskon = $paket->price * $request->discount_amount / 100;
                $nominal = $paket->price - $diskon;
            } else {
                $nominal = $paket->price - $request->discount_amount;
            }

            promo_paket::insert([
                'promotion_id' => $request->promotion_id,
                'packet_id' => $request->packet_id,
                'discount_type' => $request->discount_type,
                'discount_amount' => $request->discount_amount,
                'discounted_price' => $nominal,
                'status' => $request->status,
            ]);

            return redirect()->route('backend.promo_paket')->with(['success' => 'Berhasil Menambahkan Promo Paket!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }


    public function show($id)
    {
        $data = [
            'sidebar' => 'Promo',
            'page_name' => 'Promo Paket',
            'promo' => Promo::where('is_active', true)->get(),
            'paket' => packet::where('category_id', 3)->get(),
            'promopaket' => promo_paket::find($id)
        ];
        return view('backend.promo.promo_packet.edit', $data);
    }



    public function update(PromoPaketRequest $request, $id)
    {
        try {
            $promo_paket = promo_paket::find($id);
            $request->validated();
            $nominal = 0;
            $diskon = 0;
            $paket = packet::find($request->packet_id);
            if ($request->discount_type == 'percent') {
                $diskon = $paket->price * $request->discount_amount / 100;
                $nominal = $paket->price - $diskon;
            } else {
                $nominal = $paket->price - $request->discount_amount;
            }

            $promo_paket->update([
                'promotion_id' => $request->promotion_id,
                'packet_id' => $request->packet_id,
                'discount_type' => $request->discount_type,
                'discount_amount' => $request->discount_amount,
                'discounted_price' => $nominal,
                'status' => $request->status,
            ]);

            return redirect()->route('backend.promo_paket')->with(['success' => 'Berhasil Update Promo Paket!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }

    public function destroy(string $id)
    {
        try {
            promo_paket::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Data Promo Paket Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Data Promo Paket Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
