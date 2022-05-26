<?php

use App\Http\Controllers\LoginController;
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
Route::get('/',function(){return redirect()->route('login');});
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/auth',[LoginController::class,'auth'])->name('autenticar');
Route::middleware('validation')->get('/cliente',[LoginController::class,'cliente'])->name('cliente');


