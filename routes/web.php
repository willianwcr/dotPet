<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('welcome');
})->name('home');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.showForm');
Route::post('/login', [AuthController::class, 'doLogin'])->name('login.do');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.showForm');
Route::post('/register', [AuthController::class, 'doRegister'])->name('register.do');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');