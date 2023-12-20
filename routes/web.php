<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('auth.register');
});

Route::get('redirects', 'App\Http\Controllers\HomeController@index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    Route::group(['middleware' => 'role:0', 'prefix' => 'admin'], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    });
    
    Route::group(['middleware' => 'role:1', 'prefix' => 'mahasiswa'], function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('mahasiswa.dashboard');
    });
});