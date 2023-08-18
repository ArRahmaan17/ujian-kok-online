<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Developer\Approve;
use App\Http\Controllers\Developer\MenuController;
use App\Http\Controllers\Student\ClassroomController;
use App\Http\Controllers\Student\DashboardController;
use App\Http\Controllers\Student\ProfileController;
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

Route::middleware([NotLogged::class])->get('/', function () {
    return redirect()->route('authentication.index');
});
Route::get('/authentication/logout', [LoginController::class, 'logout'])->name('authentication.logout')->middleware([LoggedInCheck::class]);
// must be not login on application
Route::prefix('authentication')->middleware([NotLogged::class])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])
        ->name('authentication.index');
    Route::post('/login', [LoginController::class, 'login'])
        ->name('authentication.login');
});
// must be login on application
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('dashboard')->middleware([hasPrivileges::class]);
})->middleware([LoggedInCheck::class]);
Route::middleware([LoggedInCheck::class])->prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])
        ->name('profile')->middleware([hasPrivileges::class]);
    Route::get('/{username}/request-change-password', [ProfileController::class, 'requestChangePassword']);
    Route::get('/{id}/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::put('/{id}/update', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::put('/{id}/change-password', [ProfileController::class, 'changePassword'])
        ->name('profile.change-password');
});
Route::prefix('classroom')->group(function () {
    Route::get('/', [ClassroomController::class, 'index'])->name('classroom')->middleware([hasPrivileges::class]);
    Route::get('/upload', [ClassroomController::class, 'upload'])->name('classroom.upload');
    Route::post('/execute', [ClassroomController::class, 'execute'])->name('classroom.execute');
    Route::post('/homeroom-execute', [ClassroomController::class, 'executeHomeroom'])->name('homeroom.execute');
    Route::get('/classroom-template', [ClassroomController::class, 'classroomTemplateDownload'])->name('classroom.classroom-template');
    Route::get('/{className}/detail', [ClassroomController::class, 'show'])->name('classroom.detail');
    Route::get('/homeroom-upload', [ClassroomController::class, 'uploadHomeroom'])->name('homeroom.upload');
    Route::get('/homeroom-download', [ClassroomController::class, 'homeroomTemplateDownload'])->name('classroom.homeroom-template');
});

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
    Route::middleware([LoggedInCheck::class])->prefix('support')->group(function () {
        Route::get('/replace-password', [Approve::class, 'password'])->name('support.replace-password')->middleware([hasPrivileges::class]);
        // Route::get('/replace-password/{id}/reset', [Approve::class, 'processResetPassword'])->name('support.accept-reset-password');
        Route::get('/replace-password/{id}/change', [Approve::class, 'processChangePassword'])->name('support.accept-change-password');
    });
})->middleware([isDeveloper::class]);
