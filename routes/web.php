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

Route::get('/', function () {
    if(Auth::user()){//rah authentifié les user SAD mbola connecté
        return view('home');
    } else {
        return view('auth/login');
    }
});



Route::post('/modifier/{id}',[App\Http\Controllers\HomeController::class,'modifier'])->name('modifier');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/change-Mot_De_Passe',[App\Http\Controllers\HomeController::class,'UpdatePassword'])->name('change-Mot_De_Passe');
# rah ilay route no atao anaty  <form> dia ::>> {{url('/anaran le route ao am web.php'}}
#fa raha ilay name no ampesaina dia ito no atao anaty <form> ::>> {{ route('le anaran le name ao am route')}} 
