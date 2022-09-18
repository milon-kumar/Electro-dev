<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->is_admin == true){
        toast("Admin " .Auth::user()->name."Login Success",'success');
        return redirect()->route('backend.dashboard');
    }elseif (Auth::check() && Auth::user()->is_admin == false){
        toast("MR/Mis " .Auth::user()->name."Login Success",'success');
        return redirect()->route('frontend.home');
    }  else{
        toast('Unauthorized','error');
        return redirect()->route('frontend.home');
    }
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
