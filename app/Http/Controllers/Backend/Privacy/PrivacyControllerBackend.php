<?php

namespace App\Http\Controllers\Backend\Privacy;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PrivacyControllerBackend extends Controller
{
    public function index()
    {
        $data = [
            'sidebar' => 'Informasi',
            'page_name' => 'Kebijakan Privasi',
        ];
        return view('backend.privacy.index', $data);
    }



    public function getData()
    {
        $query = PrivacyPolicy::all();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.privacypolicy.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
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
            'page_name' => 'Kebijakan Privasi',
            'privacy' => PrivacyPolicy::find($id),
        ];
        return view('backend.privacy.edit', $data);
    }


    public function update(Request $request, $id)
    {
        try {
            $privacy= PrivacyPolicy::find($id);
            $privacy->update([
                'privacy' => $request->privacy
            ]);
            return redirect()->route('backend.privacypolicy')->with(['success' => 'Berhasil Update kebijakan Privasi!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
        }
    }
}
