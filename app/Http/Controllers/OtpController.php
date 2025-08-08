<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function otpForm(Request $request)
    {
        $user_id =  json_decode($request['id']);
        $user = User::find($user_id);
        if ($user) {
            return view('auth.otpForm');
        }
        return redirect()->back()->with('error', '');
    }

    public function processOtp(Request $request)
    {
        dd(vars: "hi");
    }
}
