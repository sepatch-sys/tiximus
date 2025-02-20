<?php

use App\Http\Controllers\CategoryProvinceController;
use App\Http\Controllers\CategoryTourismController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('tickets', TicketController::class);

    Route::resource('category_tourism', CategoryTourismController::class);

    Route::resource('category_province', CategoryProvinceController::class);

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-show-ticket/{id}', [HomeController::class, 'userShowTicket'])->name('user-show-ticket');
    Route::get('/tiket', [HomeController::class, 'allTicket'])->name('tickets.all');
});

require __DIR__ . '/auth.php';
