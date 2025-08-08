<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('backend.index');
    }
    public function create(){
        return view('backend.create');
    }

    public function store(Request $request){
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        $user->save();
        return redirect()->route('user.index')->with('success');
    }
}
