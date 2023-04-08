<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
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
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
// 4) Store profile
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
// 5) Change password of admin
Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
// 6) Update change password
Route::post('/admin/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

//USER ALL ROUTE

Route::middleware([
    'auth:sanctum,web',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user_dashboard', compact('user'));
    })->name('dashboard');
});
// 1) get home page
Route::get('/', [IndexController::class, 'index']);
// 2) Logout
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
// 3) Update profile
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
// 4) Store data from update profile
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
// 5) Show change password form
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
// 6)
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');

// ADMIN BRAND ALL ROUTES
Route::prefix('brand')->group(function () {
    //1) Display All Brand
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    //2 ) ADD NEW BRAND
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    //3) SHOW EDIT BRAND PAGE
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    //4) UPDATE BRAND IN DATABASE
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    //5) DELETE BRAND
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

});

// ADMIN CATEGORY ALL ROUTES
Route::prefix('category')->group(function () {
    //1) Display All CATEGORY
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    //2 ) ADD NEW CATEGORY
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    //3) SHOW EDIT CATEGORY PAGE
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    //4) UPDATE CATEGORY IN DATABASE
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    //5) DELETE CATEGORY
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

});
// ADMIN SUBCATEGORY ALL ROUTES
Route::prefix('subcategory')->group(function () {
    //1) Display All CATEGORY
    Route::get('/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    //2 ) ADD NEW CATEGORY
    Route::post('/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    //3) SHOW EDIT CATEGORY PAGE
    Route::get('/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    //4) UPDATE CATEGORY IN DATABASE
    Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    //5) DELETE CATEGORY
    Route::get('/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

});