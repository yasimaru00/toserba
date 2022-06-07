<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\{
    UserController,
};

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware'=>'level:1'], function(){
    Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
    Route::resource('/user', UserController::class);
});
Route::group(['middleware'=>'level:1,2'], function(){
    Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
    Route::resource('/profil', UserController::class);
});