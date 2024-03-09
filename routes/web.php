<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::get('/register', [RegisterController::class, 'create'])->name('register');

Route::get('/profile', [ProfileController::class, 'create'])->name('profile');

Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::get('/event/edit/{article}', [EventController::class, 'edit'])->name('event.edit');
Route::get('/event/{article}', [EventController::class, 'show'])->name('event.show');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

