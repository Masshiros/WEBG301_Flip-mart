<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CouponController;

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;

use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
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

// ADMIN ROUTE
Route::middleware(['auth:admin'])->group(function () {
    Route::middleware([
        'auth:sanctum,admin',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('backend.admin.index');
        })->name('dashboard');
    });
    // ADMIN AUTH ALL ROUTES
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

    Route::prefix('admin')->group(function () {

        // ADMIN USER ALL ROUTES
        Route::prefix('user')->group(function () {
            //1) Display All USER
            Route::get('/view', [UserController::class, 'UserView'])->name('all.user');
            //2) SHOW EDIT USER PAGE
            Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
            //3) UPDATE USER IN DATABASE
            Route::post('/update', [UserController::class, 'UserUpdate'])->name('user.update');
            //4) DELETE USER
            Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');

        });
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

        // ADMIN SLIDER ALL ROUTES
        Route::prefix('slider')->group(function () {
            //1) Display All Slider
            Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
            //2 ) ADD NEW SLIDER
            Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
            //3) SHOW EDIT SLIDER PAGE
            Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
            //4) UPDATE SLIDER IN DATABASE
            Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
            //5) DELETE SLIDER
            Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
            //6) INACTIVATE SLIDER
            Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
            //7) ACTIVATE SLIDER
            Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
            //8) DELETE SLIDER
            Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

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

            // ADMIN SUBCATEGORY ALL ROUTES
            //1) Display All CATEGORY
            Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
            //2 ) ADD NEW CATEGORY
            Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
            //3) SHOW EDIT CATEGORY PAGE
            Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
            //4) UPDATE CATEGORY IN DATABASE
            Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
            //5) DELETE CATEGORY
            Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');

            // ADMIN SUB->SUBCATEGORY ALL ROUTES
            //1) Display All CATEGORY
            Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');

            //2) GET SUBCATEGORY WITH AJAX
            Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
            //3) GET SUBSUBCATEGORY WITH AJAX
            Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);
            //4 ) ADD NEW CATEGORY
            Route::post('/sub/sub/store', [SubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
            //5) SHOW EDIT CATEGORY PAGE
            Route::get('/sub/sub/edit/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
            //6) UPDATE CATEGORY IN DATABASE
            Route::post('/sub/sub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
            //7) DELETE CATEGORY
            Route::get('/sub/sub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');

        });

        // ADMIN PRODUCT ALL ROUTES
        Route::prefix('product')->group(function () {
            //1) Display Product Add Page
            Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');

            //2 Store New Product
            Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');

            //3 Manage Product
            Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
            //4) Display Product Edit Page
            Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
            //5) Update Data Product
            Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product.update');
            //6) Update Multi-Img Product
            Route::post('/image/update', [ProductController::class, 'ProductMultiImageUpdate'])->name('product.update-image');
            //7) Update Thumbnail Product
            Route::post('/thumbnail/update', [ProductController::class, 'ProductThumbnailUpdate'])->name('product.update-thumbnail');
            //8) DELETE MULTI IMAGE
            Route::get('/multiimg/delete/{id}', [ProductController::class, 'DeleteMultiImage'])->name('product.multi.delete');
            //9) INACTIVATE PRODUCT
            Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
            //10) ACTIVATE PRODUCT
            Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
            //11) DELETE PRODUCT
            Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
            // 12) Display Detail Page
            Route::get('/detail/{id}', [ProductController::class, 'ProductDetail'])->name('product.detail');

        });
         // ADMIN COUPONS ALL ROUTES
         Route::prefix('coupons')->group(function () {
            //1) Display All Coupon
            Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
            //2) Add new Coupon
            Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
            //3) Display Coupon Edit
            Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
            //4) Update
            Route::post('/update', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
            //5) Delete One Coupon
            Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
            

        });
    });
});

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

//// FRONTEND ALL ROUTES ////
/// MULTI LANG ROUTES
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');
Route::get('/language/chinese', [LanguageController::class, 'Chinese'])->name('chinese.language');
Route::get('/language/vietnamese', [LanguageController::class, 'Vietnamese'])->name('vietnamese.language');

// FRONTEND PRODUCT DETAILS PAGE URL
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetail']);

// FRONTEND PRODUCT TAGS PAGE URL
Route::get('/product/tag/{tag}', [IndexController::class, 'ProductByTags']);

// FRONTEND SUBCATEGORY WISE DATA
Route::get('/subcategory/product/{id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);

// FRONTEND SUBSUBCATEGORY WISE DATA
Route::get('/subsubcategory/product/{id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);

// FRONTEND PRODUCT VIEW MODAL WITH ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

////////////////////////////////CART///////////////////////////
// ADD TO CART STORE DATA
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// ADD DATA TO MINI CART
Route::get('/product/mini-cart', [CartController::class, 'AddToMiniCart']);

// FRONTEND REMOVE MINI CART
Route::get('/product/mini-cart/remove/{id}', [CartController::class, 'RemoveMiniCart']);


////////////////////////////////WISHLIST///////////////////////////
// FRONTEND ADD TO WISHLIST
Route::post('/add-to-wishlist/{id}', [WishlistController::class, 'AddToWishList']);
// PROTECT WISHLIST PAGE
Route::group(['prefix' => 'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
    // FRONTEND WISHLIST PAGE
    Route::get('/wishlist', [WishlistController::class, 'ViewWishList'])->name('wishlist');

    // FRONTEND GET WISHLIST PRODUCT
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

    // FRONTEND REMOVE WISHLIST PRODUCT
    Route::get('/wishlist-remove/{product_id}', [WishlistController::class, 'RemoveWishlistProduct']);

   
});
/////////////////////MY CART PAGE ALL ROUTES ////////////////
 // FRONTEND MYCART PAGE
 Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
    
 // FRONTEND GET MYCART PRODUCT
 Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
 
 // FRONTEND REMOVE MYCART PRODUCT
 Route::get('/user/cart-remove/{id}', [CartPageController::class, 'RemoveCartProduct']);
 
 // FRONTEND  MYCART PRODUCT INCREMENT QUANTITY
 Route::get('/cart-increment/{id}', [CartPageController::class, 'CartIncrement']);
 
 // FRONTEND  MYCART PRODUCT DECREMENT QUANTITY
 Route::get('/cart-decrement/{id}', [CartPageController::class, 'CartDecrement']);


 // FRONTEND COUPON OPTION
Route::post('/coupon-apply',[CartController::class,'CouponApply']);

 // FRONTEND COUPON CALCULATION
Route::get('/coupon-calculation',[CartController::class,'CouponCalculation']);

 // FRONTEND COUPON  REMOVE
Route::get('/coupon-remove',[CartController::class,'CouponRemove']);