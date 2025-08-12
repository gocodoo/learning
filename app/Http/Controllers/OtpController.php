<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
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
        $user = Auth::user();
        $token_2fa_req = $request->get('token_2fa');

        if($token_2fa_req === $user->token_2fa){
            return redirect()->route('user.index');
        }else{
            return redirect()->route('verify.index')->with('error','Invalid');
        }
    }
}
