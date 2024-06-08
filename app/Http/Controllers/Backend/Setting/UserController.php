<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
   public function index(){
    return view('backend.settings.users.index');
   }

   public function getData(){
    $query = User::all();
    return DataTables::of($query)->addIndexColumn()->addColumn('action', function ($query) {
        $button = '';
            $button .= ' <button  class="btn btn-sm btn-primary mr-1 action" data-id=' . $query->id . ' data-type="show" data-route="' . route('query.detail', ['id' => $query->id]) . '" data-toggle="tooltip" data-placement="bottom" title="Show Data"><i
                                                        class="fas fa-eye"></i></button>';
        
        
            $button .= ' <a href="' . route('query.edit', ['id' => $query->id]) . '" class="btn btn-sm btn-success action mr-1" data-id=' . $query->id . ' data-type="edit" data-toggle="tooltip" data-placement="bottom" title="Edit Data"><i
                                                        class="fa-solid fa-pencil"></i></a>';
        return '<div class="d-flex">' . $button . '</div>';
    })->make(true);
   }
}
