<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtpController extends Controller
{
    public function otpForm(Request $request){
        $request =  json_decode($request['user']);
        // dd($request);
        return view('auth.otpForm');
    }
}
