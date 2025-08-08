<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware([AdminMiddleware::class, Authenticate::class])->group(function () {
    Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
});

Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
Route::get('/admin/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/admin/verify', [OtpController::class, 'otpForm'])->name('verify.index');
Route::post('/admin/verify/otp', [OtpController::class, 'processOtp'])->name('verify.otp');
