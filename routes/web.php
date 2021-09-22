<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AxiosReceiverController;
use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('sendrequest', [AxiosReceiverController::class, 'ReceiveIt']);
Route::post('loginpost', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::view('/{path?}', 'app');
