<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Gate;

class AuthController extends Controller
{
    public function index()
    {
        return view('backend.auth.login.index');
    }
    public function signin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $user = User::where(['username' => $request->username]);
        if ($user->count() > 0) {
            $user = $user->first();

            if ($user->is_block == 1) {
                return redirect()->back()->withErrors([
                    'message' => 'Akun ini telah di kunci, silahkan hubungi admin untuk membuka akun.'
                ]);
            } else {
                if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                    $request->session()->regenerate();
                    if ($request->rememberme == 'Y') {
                        $time = 60 * 60 * 24 * 365;
                        Cookie::queue('username', $request->username, $time);
                        Cookie::queue('password', $request->password, $time);
                    }
                    if ($user->hasPermissionTo('read-dashboard')) {
                        return redirect()->route('dashboard')->with(['success' => "Berhasil Login"]);
                    }else{
                        return redirect()->route('backend.media')->with(['success' => "Berhasil Login"]);
                    }
                } else {
                    return
                        redirect()->back()->withErrors([
                            'message' => 'Wrong username or password'
                        ]);
                }
            }
        } else {
            return redirect()->back()->withErrors([
                'message' => 'Akun tidak terdaftar'
            ]);
        }
    }



    public function signout()
    {
        Auth::logout();
        return redirect('/');
    }
}
