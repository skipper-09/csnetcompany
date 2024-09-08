<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    public function index(Role $role)
    {
        $remappedPermission = [];
        $permissions = Permission::all()->pluck('name');


        foreach ($permissions as $permission) {
            $explodePermissions = \explode('-', $permission);
            $slicePermissions = array_slice($explodePermissions, 1);
            $implodePermissions = \implode('-', $slicePermissions);
            $remappedPermission[$implodePermissions][] = $permission;
        }

        $data = [
            'page_name' => 'Ubah Permission',
            'sidebar' => 'Role',
            'role' => $role,
            'permissions' => $remappedPermission,
        ];

        return view('backend.settings.role.permission', $data);
    }
}
