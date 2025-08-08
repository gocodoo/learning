<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user(); 
        if(config('auth.enable_otp')){
            if (Auth::check() && $user) {
                return redirect()->route('verify.index');
            }
            else {
                abort(403, 'Unauthorized access.');
            }
        }else{
            if(Auth::check() && $user) {
                return $next($request);
            }
        }
    }
}
