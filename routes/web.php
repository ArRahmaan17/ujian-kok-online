<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Middleware\LoggedInCheck;
use App\Http\Middleware\NotLogged;
use Illuminate\Support\Facades\Auth;
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
});
// must be not login on application 
Route::prefix('authentication')->middleware([NotLogged::class])->group(function () {
    Route::get('/login', function () {
        return view('authentication.index');
    })->name('authentication.index');
    Route::post('/login', [LoginController::class, 'login'])->name('authentication.login');
});
// must be login on application 
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
})->middleware([LoggedInCheck::class]);
