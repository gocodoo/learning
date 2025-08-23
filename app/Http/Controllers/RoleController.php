<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        return view('backend.roles.index');
    }

    public function create(Request $request){
        return view('backend.roles.create');
    }

    public function store(Request $request){
        $roles = Role::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        $roles->save();

        return redirect()->route('role.index');
    }
}
