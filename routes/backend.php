<?php


use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'backend','as'=>'backend.','middleware'=>['auth','admin']],function (){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
});




