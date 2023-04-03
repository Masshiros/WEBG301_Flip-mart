<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
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
    return view('welcome');
});
// LOGIN ROUTE
Route::middleware('admin:admin')->group(function () {
    Route::get('admin/login', [AdminController::class, 'loginForm']);
    Route::post('admin/login', [AdminController::class, 'store'])->name('admin.login');

});
Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});
// ADMIN ALL ROUTES
// 1) Logout
Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
// 2) Show profile 
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
// 3) Edit profile
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

Route::middleware([
    'auth:sanctum,web',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});