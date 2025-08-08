<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function auth(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', '');
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Incorrect ');
        }
        $user->generateCodeTwoFactor();
        $user->save();
        return redirect()->route('verify.index', ['id' => json_encode( $user["id"])]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
