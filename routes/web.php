<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Developer\MenuController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Middleware\hasPrivileges;
use App\Http\Middleware\isDeveloper;
use App\Http\Middleware\LoggedInCheck;
use App\Http\Middleware\NotLogged;
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

Route::get('/', function () {
    return redirect()->route('authentication.index');
})->middleware([NotLogged::class]);
Route::get('/authentication/logout', [LoginController::class, 'logout'])->name('authentication.logout')->middleware([LoggedInCheck::class]);
// must be not login on application
Route::prefix('authentication')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])
        ->name('authentication.index');
    Route::post('/login', [LoginController::class, 'login'])
        ->name('authentication.login');
})->middleware([NotLogged::class]);
// must be login on application
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard')->middleware([hasPrivileges::class]);
})->middleware([LoggedInCheck::class]);

// must be a developer user
Route::prefix('developer')->group(function () {
    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('menu')->middleware([hasPrivileges::class]);
        Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
        Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/{id}/update', [MenuController::class, 'update'])->name('menu.update');
        Route::put('/order', [MenuController::class, 'order'])->name('menu.order');
    });
})->middleware([isDeveloper::class]);
