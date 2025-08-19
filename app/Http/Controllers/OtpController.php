<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function otpForm(Request $request)
    {
        $user_id =  json_decode($request['id']);
        $user = User::find($user_id);
        if ($user) {
            $request->session()->put('user_id',$user_id);
            return view('auth.otpForm');
        }
        return redirect()->back()->with('error', '');
    }

    public function processOtp(Request $request)
    {
        $user_id =$request->session()->get('user_id');
        $user = User::find($user_id);
        // dd($user,$user_id);
        $token_2fa_req = $request->get('token_2fa');
        if($token_2fa_req === $user->token_2fa){
            Auth::login($user);
            return redirect()->route('user.index');
        }else{
            return redirect()->route('verify.index')->with('error','Invalid');
        }
    }
}
