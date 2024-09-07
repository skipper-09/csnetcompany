<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
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
        })->rawColumns(['action', 'roles'])->make(true);
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
            User::create($request->only(['name', 'email', 'password', 'username',]))->assignRole($request->role);
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


    public function update(UserRequest $request, User $user, $id)
    {
        try {
            $request->validated();
            $user->find($id)->get();
            if ($request->password == null && $request->password_confirmation == null) {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => $user->password,
                    'username' => $request->username,
                ]);
            } else {
                $user->update([
                    'name' => $request->name,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
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
