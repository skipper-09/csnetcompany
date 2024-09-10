<?php

namespace App\Http\Controllers\Backend\TremofServiceBackend;

use App\Http\Controllers\Controller;
use App\Models\TremofService;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TremofServiceBackendController extends Controller
{
    public function index()
    {
        $data = [
            'sidebar' => 'Informasi',
            'page_name' => 'Syarat Dan Ketentuan',
        ];
        return view('backend.tremofservice.index', $data);
    }



    public function getData()
    {
        $query = TremofService::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.tremofservice.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';
            // $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.tremofservice', ['id' => $query->id]) . '"><i
            //                                                 class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->rawColumns(['action'])->make(true);
    }


    public function show($id)
    {
        $data = [
            'sidebar' => 'Informasi',
            'page_name' => 'Syarat Dan Ketentuan',
            'tremofservice' => TremofService::find($id),
        ];
        return view('backend.tremofservice.edit', $data);
    }


    public function update(Request $request, $id)
    {
        try {
            $tremofService= TremofService::find($id);
            $tremofService->update([
                'tremofservice' => $request->tremofservice
            ]);
            return redirect()->route('backend.tremofservice')->with(['success' => 'Berhasil Update Syarat Dan Ketentuan!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }
}
