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

//Cart Section
Route::get('cart',[\App\Http\Controllers\Frontend\CartController::class,'cart'])->name('cart');
Route::post('cart/store',[\App\Http\Controllers\Frontend\CartController::class,'cartStore'])->name('cart.store');
Route::post('cart/delete',[\App\Http\Controllers\Frontend\CartController::class,'cartDelete'])->name('cart.delete');
Route::post('cart/update',[\App\Http\Controllers\Frontend\CartController::class,'cartUpdate'])->name('cart.update');

//Coupon Section
Route::post('coupon/add',[\App\Http\Controllers\Frontend\CartController::class,'couponAdd'])->name('coupon.add');
Route::get('coupon/remove',[\App\Http\Controllers\Frontend\CartController::class,'couponRemove'])->name('coupon.remove');

//Wishlist Section
Route::get('wishlist',[\App\Http\Controllers\Frontend\WishlistController::class,'wishlist'])->name('wishlist');
Route::post('wishlist/store',[\App\Http\Controllers\Frontend\WishlistController::class,'wishlistStore'])->name('wishlist.store');
Route::post('wishlist/move-to-cart',[\App\Http\Controllers\Frontend\WishlistController::class,'moveToCart'])->name('wishlist.move.cart');
Route::post('wishlist/remove',[\App\Http\Controllers\Frontend\WishlistController::class,'wishlistRemove'])->name('wishlist.remove');

//Checkout Section
Route::get('checkout1',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkout1'])->name('checkout1')->middleware('user');
Route::post('checkout1-first',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkout1Store'])->name('checkout1.store');
Route::post('checkout2-two',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkout2Store'])->name('checkout2.store');
Route::post('checkout2-three',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkout3Store'])->name('checkout3.store');
Route::get('checkout-store',[\App\Http\Controllers\Frontend\CheckoutController::class,'checkoutStore'])->name('checkout.store');
Route::get('complete/{order}',[\App\Http\Controllers\Frontend\CheckoutController::class,'complete'])->name('complete');

//Shop Section
Route::get('shop',[\App\Http\Controllers\Fronted\IndexController::class,'shop'])->name('shop');
Route::post('shop-filter',[\App\Http\Controllers\Fronted\IndexController::class,'shopFilter'])->name('shop.filter');

//Search product && autosearch product
Route::get('autosearch',[\App\Http\Controllers\Fronted\IndexController::class,'autoSearch'])->name('autosearch');
Route::get('search',[\App\Http\Controllers\Fronted\IndexController::class,'search'])->name('search');




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

    //Product Attribute Section
    Route::post('product-attribute/{id}',[\App\Http\Controllers\ProductController::class,'addProductAttribute'])->name('product.attribute');
    Route::delete('product-attribute-delete/{id}',[\App\Http\Controllers\ProductController::class,'addProductAttributeDelete'])->name('product.attribute.destroy');

    //User Section
    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::post('user_status',[\App\Http\Controllers\UserController::class,'userStatus'])->name('user.status');

    //Coupon Section
    Route::resource('/coupon', \App\Http\Controllers\CouponController::class);
    Route::post('coupon_status',[\App\Http\Controllers\CouponController::class,'couponStatus'])->name('coupon.status');

    //Shipping Section
    Route::resource('/shipping', \App\Http\Controllers\ShippingController::class);
    Route::post('shipping_status',[\App\Http\Controllers\ShippingController::class,'shippingStatus'])->name('shipping.status');

});



Route::group(['prefix'=>'seller','middleware'=>['auth','seller']],function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'admin'])->name('seller');
});

//UserDashboard
Route::group(['prefix'=>'user'],function (){
    Route::get('/dashboard',[\App\Http\Controllers\Fronted\IndexController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/order',[\App\Http\Controllers\Fronted\IndexController::class,'userOrder'])->name('user.order');
    Route::get('/address',[\App\Http\Controllers\Fronted\IndexController::class,'userAddress'])->name('user.address');
    Route::get('/account-detail',[\App\Http\Controllers\Fronted\IndexController::class,'userAccount'])->name('user.account');

    Route::post('/billing/address/{id}',[\App\Http\Controllers\Fronted\IndexController::class,'billingAddress'])->name('billing.address');
    Route::post('/shipping/address/{id}',[\App\Http\Controllers\Fronted\IndexController::class,'shippingAddress'])->name('shipping.address');
    Route::post('/{id}',[\App\Http\Controllers\Fronted\IndexController::class,'updateAccount'])->name('update.account');
});
