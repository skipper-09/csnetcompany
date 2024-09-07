<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'sidebar' => 'setting',
            'page_name' => 'User',
        ];
        return view('backend.settings.users.index', $data);
    }

    public function getData()
    {
        // $query = User::whereNotIn('id', [Auth::user()->id])->get();
        $query = User::with('roles')->whereNotIn('name', ['Developer'])->get();
        return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
            $button = '';
            $button .= ' <a href="' . route('backend.users.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action " data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fas fa-pen"></i></a>';

            $button .= ' <button class="btn btn-sm btn-danger action" data-id=' . $query->id . ' data-type="delete" data-route="' . route('backend.users.delete', ['id' => $query->id]) . '"><i
                                                            class="fas fa-trash"></i></button>';
            return '<div class="d-flex gap-1">' . $button . '</div>';
        })->editColumn('roles', function ($data) {
            return $data->roles[0]->name;
        })->editColumn('is_block', function ($query) {
            $active = '';
            $query->is_block == 1 ? $active = '<span class="badge bg-label-primary">BLOCK</span>' : $active = '<span class="badge bg-label-warning">AKTIF</span>';
            return $active;
        })->rawColumns(['action', 'roles','is_block'])->make(true);
    }

    public function create()
    {
        $data = [
            'sidebar' => 'setting',
            'page_name' => 'User',
            'role' => Role::whereNotIn('name', ['Developer'])->get(),
        ];
        return view('backend.settings.users.add', $data);
    }


    public function store(UserRequest $request, User $user)
    {
        try {
            $request->validated();
            $request->merge(['password' => Hash::make($request->password),]);
            User::create($request->only(['name', 'email', 'password', 'username','is_block']))->assignRole($request->role);
            return redirect()->route('backend.users')->with(['success' => 'Berhasil Menambahkan User!']);
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
            'sidebar' => 'setting',
            'page_name' => 'User',
            'role' => Role::whereNotIn('name', ['Developer'])->get(),
            'user' => User::find($id),
        ];
        return view('backend.settings.users.edit', $data);
    }


    public function update(UserRequest $request, $id)
    {
        try {
            $request->validated();
            $user= User::find($id);

            //cek in tabel model hasrole
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            //new assign role 
            $user->assignRole($request->role);
            //cek req null pass
            if ($request->password == null || $request->password_confirmation == null) {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $user->password,
                    'username' => $request->username,
                    'is_block'=>$request->is_block
                ]);
            } else {
                $user->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'is_block'=>$request->is_block,
                ]);
                
            }
            return redirect()->route('backend.users')->with(['success' => 'Berhasil Update Profile!']);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }



    public function destroy($id)
    {
        try {
            User::where('id', $id)->delete();
            //return response
            return response()->json([
                'status' => 'success',
                'success' => true,
                'message' => 'User Berhasil Dihapus!.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'User Tidak Bisa Dihapus Karena Masih digunakan!',
                'trace' => $e->getTrace()
            ]);
        }
    }
}
