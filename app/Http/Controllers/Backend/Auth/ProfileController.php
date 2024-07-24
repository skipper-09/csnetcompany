<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
}
