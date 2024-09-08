<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($id)
    {
        $data = [
            'sidebar' => 'Profile',
            'profile' => User::find($id),
            'page_name' => 'Profile',
        ];
        return view('backend.auth.profile.index', $data);
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);
        //cek req null pass
        if ($request->password == null || $request->password_confirmation == null) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $user->password,
                'username' => $user->username,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'username' => $user->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }
        return redirect()->route('backend.profile.edit', ['id' => $user->id])->with(['success' => 'Berhasil Update Profile!']);
    }
}
