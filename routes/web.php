<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KeyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'login'])->name('login.check');
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::group(['prefix'=>'key','middleware'=>'auth'],function(){

    Route::get('add',[KeyController::class,'add'])->name('key.add');
    Route::post('store',[KeyController::class,'store'])->name('key.store');

});

Route::view('key','guest.check-key')->name('key.check');
Route::post('key/check',[KeyController::class,'check'])->name('key.check');

// Redirect the Remaining Routes to default route
Route::fallback(function() {
    return redirect('key');
});