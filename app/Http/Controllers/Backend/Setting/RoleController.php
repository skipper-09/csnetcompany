<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index()
    {
        $data = [
            'sidebar' => 'setting',
            'page_name' => 'Role',
        ];
        return view('backend.settings.role.index', $data);
    }

    public function getData()
    {
        // $query = User::whereNotIn('id', [Auth::user()->id])->get();
        $query = Role::whereNotIn('name', ['Developer'])->get();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.role.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';

            $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.role.delete', ['id' => $query->id]) . '"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->rawColumns(['action'])->make(true);
    }

    public function create()
    {
        $data = [
            'sidebar' => 'setting',
            'page_name' => 'Role',
        ];
        return view('backend.settings.role.add', $data);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Role::create($request->only(['name']));
        return redirect()->route('backend.role')->with(['success' => 'Berhasil Membuat Role!']);
    }


    public function show($id)
    {
        $data = [
            'sidebar' => 'setting',
            'page_name' => 'Role',
            'role' => Role::find($id)
        ];
        return view('backend.settings.role.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $role = Role::find($id);
        $role->update($request->only(['name']));
        return redirect()->route('backend.role')->with(['success' => 'Berhasil Update Role!']);
    }




    public function destroy(string $id)
    {
        try {
            $Role = Role::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'Role Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'RoleTidak Bisa Dihapus Karena Masih digunakan oleh Harga Paket!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
