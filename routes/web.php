<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.create');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.store');
    Route::get('/forgot-password/{token}', [ForgotPasswordController::class, 'edit'])->name('password.reset');
    Route::post('/forgot-password/reset', [ForgotPasswordController::class, 'update'])->name('password.update');

});

Route::middleware(['role:admin|organizer|user'])->group(function () {
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

    Route::get('/profile/show/{article}', [ProfileController::class, 'show'])->name('profile.show');

    Route::post('/event/reservation', [EventController::class, 'makeReservation'])->name('event.reservation');
});

Route::middleware(['role:admin|organizer'])->group(function () {
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::get('/event', [EventController::class, 'index'])->name('event');
    Route::post ('/event/store', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/edit/{article}', [EventController::class, 'edit'])->name('event.edit');
    Route::post('/event/update', [EventController::class, 'update'])->name('event.update');
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/role', [ProfileController::class, 'editRole'])->name('profile.role');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::post('/event/status', [EventController::class, 'changeStatus'])->name('event.status');
    Route::post('/event/destroy', [EventController::class, 'destroy'])->name('event.destroy');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/category/{keyWord}', [EventController::class, 'byCatName'])->name('category.search');
Route::post('/title', [EventController::class, 'byTitle'])->name('title.search');

Route::get('/event/{article}', [EventController::class, 'show'])->name('event.show');
