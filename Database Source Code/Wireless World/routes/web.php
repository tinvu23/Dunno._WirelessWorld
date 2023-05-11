<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PagesController;
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

// Home Controller
Route::get('/', [HomeController::class, 'index']) -> name('/');
Route::get('index',[HomeController::class, 'index']) -> name('index');
Route::get('category/{id}',[HomeController::class, 'category']) -> name('category') -> where ('id','[0-9]+');
Route::get('brand/{id}',[HomeController::class, 'brand']) -> name('brand') -> where ('id','[0-9]+');
Route::get('about', [HomeController :: class, 'about']) -> name('about');
Route::get('gallery', [HomeController :: class, 'gallery']) -> name('gallery');
Route::get('contact', [HomeController :: class, 'getContact']) -> name('getContact');
Route::post('contact', [HomeController :: class, 'postContact']) -> name('postContact');
Route::get('user', [HomeController :: class, 'user']) -> name('user');
Route::get('detail/{id}', [HomeController :: class, 'detail']) -> name('detail') -> where ('id','[0-9]+');
Route::post('newsletter',[HomeController::class, 'newsletter']) -> name('newsletter');
Route::post('rating/{id}',[HomeController::class, 'rating']) -> name('rating') -> where ('id','[0-9]+');
// News Controller
Route::get('news',[PagesController::class, 'news']) -> name('news');
Route::get('seller',[PagesController::class, 'seller']) -> name('seller');
Route::get('budget',[PagesController::class, 'budget']) -> name('budget');
Route::get('technology',[PagesController::class, 'technology']) -> name('technology');
Route::get('pages/{id}',[PagesController::class, 'pages']) -> name('pages') -> where ('id','[0-9]+');
// Search Controller
Route::post('search', [SearchController :: class, 'search']) -> name('search');
// Cart Controller
Route::get('addCart/{id}', [CartController :: class, 'addCart'])-> middleware('login')  -> name('addCart') -> where ('id','[0-9]+');
Route::get('deleteCart/{id}', [CartController :: class, 'deleteCart'])-> middleware('login') -> name('deleteCart');
Route::get('minusCart/{id}', [CartController :: class, 'minusCart'])-> middleware('login') -> name('minusCart');
Route::get('plusCart/{id}', [CartController :: class, 'plusCart'])-> middleware('login') -> name('plusCart');
Route::get('addWishlist/{id}', [CartController :: class, 'addWishlist'])-> middleware('login')  -> name('addWishlist');
Route::get('cart', [CartController :: class, 'cart'])-> middleware('login')  -> name('cart');
Route::get('wishlist', [CartController :: class, 'wishlist'])-> middleware('login')  -> name('wishlist');
Route::get('getOrder', [CartController :: class, 'getOrder'])-> middleware('login')  -> name('getOrder');
Route::post('postOrder', [CartController :: class, 'postOrder'])-> middleware('login')  -> name('postOrder');
Route::get('listOrder', [CartController :: class, 'listOrder'])-> middleware('login')  -> name('listOrder');
// User Controller
Route::get('login', [UserController :: class, 'getLogin']) -> name('getLogin');
Route::post('login', [UserController :: class, 'postLogin']) -> name('postLogin');
Route::get('logout', [UserController :: class, 'logout']) -> name('logout');
Route::get('register', [UserController::class,'getRegister']) -> name('getRegister');
Route::post('register', [UserController::class,'postRegister']) -> name('postRegister');
Route::get('getPassword',[UserController::class,'getPassword']) -> name('getPassword');
Route::post('postPassword',[UserController::class,'postPassword']) -> name('postPassword');
// Admin Controller
Route::get('admin', [DashboardController::class,'admin']) -> middleware('login') -> middleware('level') -> name('admin');
Route::prefix('admin') -> middleware('login') -> middleware('level') -> name('admin.') -> group(function () {
    Route::prefix('order') -> name('order.') -> group(function () {
        Route::get('index', [OrderController::class, 'index']) -> name('index');
        Route::get('delete/{id}', [OrderController::class, 'delete']) -> name('delete');
        Route::get('edit/{id}', [OrderController::class, 'edit']) -> name('edit') -> where ('id','[0-9]+');
        Route::post('update/{id}',[OrderController::class,'update']) -> name('update') -> where ('id','[0-9]+');
        Route::post('search', [OrderController :: class, 'search']) -> name('search');
    });
    Route::prefix('member') -> name('member.') -> group(function () {
        Route::get('index', [MemberController::class, 'index']) -> name('index');
        Route::get('delete/{id}', [MemberController::class, 'delete']) -> name('delete');
        Route::get('create', [MemberController::class, 'create']) -> name('create');
        Route::post('store', [MemberController::class, 'store']) -> name('store');
        Route::get('edit/{id}', [MemberController::class, 'edit']) -> name('edit') -> where ('id','[0-9]+');
        Route::post('update/{id}',[MemberController::class,'update']) -> name('update') -> where ('id','[0-9]+');
        Route::post('search', [MemberController :: class, 'search']) -> name('search');
    });
    Route::prefix('news') -> name('news.') -> group(function () {
        Route::get('index', [NewsController::class, 'index']) -> name('index');
        Route::get('delete/{id}', [NewsController::class, 'delete']) -> name('delete');
        Route::get('create', [NewsController::class, 'create']) -> name('create');
        Route::post('store', [NewsController::class, 'store']) -> name('store');
        Route::get('edit/{id}', [NewsController::class, 'edit']) -> name('edit') -> where ('id','[0-9]+');
        Route::post('update/{id}',[NewsController::class,'update']) -> name('update') -> where ('id','[0-9]+');
        Route::post('search', [NewsController :: class, 'search']) -> name('search');
    });
    Route::prefix('category') -> name('category.') -> group(function () {
        Route::get('index', [CategoryController::class, 'index']) -> name('index');
        Route::get('delete/{id}', [CategoryController::class, 'delete']) -> name('delete');
        Route::get('create', [CategoryController::class, 'create']) -> name('create');
        Route::post('store', [CategoryController::class, 'store']) -> name('store');
        Route::get('edit/{id}', [CategoryController::class, 'edit']) -> name('edit') -> where ('id','[0-9]+');
        Route::post('update/{id}',[CategoryController::class,'update']) -> name('update') -> where ('id','[0-9]+');
    });
    Route::prefix('product') -> name('product.') -> group(function () {
        Route::get('index', [ProductController::class, 'index']) -> name('index');
        Route::get('delete/{id}', [ProductController::class, 'delete']) -> name('delete');
        Route::get('create', [ProductController::class, 'create']) -> name('create');
        Route::post('store', [ProductController::class, 'store']) -> name('store');
        Route::get('edit/{id}', [ProductController::class, 'edit']) -> name('edit') -> where ('id','[0-9]+');
        Route::post('update/{id}',[ProductController::class,'update']) -> name('update') -> where ('id','[0-9]+');
        Route::post('search', [ProductController :: class, 'search']) -> name('search');
    });
    Route::prefix('brand') -> name('brand.') -> group(function () {
        Route::get('index', [BrandController::class, 'index']) -> name('index');
        Route::get('delete/{id}', [BrandController::class, 'delete']) -> name('delete');
        Route::get('create', [BrandController::class, 'create']) -> name('create');
        Route::post('store', [BrandController::class, 'store']) -> name('store');
        Route::get('edit/{id}', [BrandController::class, 'edit']) -> name('edit') -> where ('id','[0-9]+');
        Route::post('update/{id}',[BrandController::class,'update']) -> name('update') -> where ('id','[0-9]+');
        Route::post('search', [BrandController :: class, 'search']) -> name('search');
    });
});


