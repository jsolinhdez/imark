<?php

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
//Authentication
Route::get('user/auth',[\App\Http\Controllers\Fronted\IndexController::class,'userAuth'])->name('user.auth');
Route::post('user/login',[\App\Http\Controllers\Fronted\IndexController::class,'loginSubmit'])->name('login.submit');
Route::post('user/register',[\App\Http\Controllers\Fronted\IndexController::class,'registerSubmit'])->name('register.submit');


Route::get('user/logout',[\App\Http\Controllers\Fronted\IndexController::class,'userLogout'])->name('user.logout');


//Frontend Section
Route::get('/',[\App\Http\Controllers\Fronted\IndexController::class,'home'])->name('home');

//Product category
Route::get('product-category/{slug}/',[\App\Http\Controllers\Fronted\IndexController::class,'productCategory'])->name('product.category');
//Product detail
Route::get('product-detail/{slug}/',[\App\Http\Controllers\Fronted\IndexController::class,'productDetail'])->name('product.detail');
//END Frontend Section

Auth::routes(['register'=>false]);


//Admin Dashboard

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/',[\App\Http\Controllers\AdminController::class,'admin'])->name('admin');

    //Banner Section
    Route::resource('/banner', \App\Http\Controllers\BannerController::class);
    Route::post('banner_status',[\App\Http\Controllers\BannerController::class,'bannerStatus'])->name('banner.status');
    //Category Section
    Route::resource('/category', \App\Http\Controllers\CategoryController::class);
    Route::post('category_status',[\App\Http\Controllers\CategoryController::class,'categoryStatus'])->name('category.status');

    Route::post('category/{id}/child',[\App\Http\Controllers\CategoryController::class,'getChildByParentID']);

    //Brand Section
    Route::resource('/brand', \App\Http\Controllers\BrandController::class);
    Route::post('brand_status',[\App\Http\Controllers\BrandController::class,'brandStatus'])->name('brand.status');
    //Product Section
    Route::resource('/product', \App\Http\Controllers\ProductController::class);
    Route::post('product_status',[\App\Http\Controllers\ProductController::class,'productStatus'])->name('product.status');
    //User Section
    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::post('user_status',[\App\Http\Controllers\UserController::class,'userStatus'])->name('user.status');
});



Route::group(['prefix'=>'seller','middleware'=>['auth','seller']],function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('seller');
});
