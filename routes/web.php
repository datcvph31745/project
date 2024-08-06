<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChiTietSanPhamController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController; // Corrected to OrderController
use App\Http\Controllers\DanhMucController; // Updated to DanhMucController
use App\Http\Controllers\DonHangController; // Updated to DanhMucController
use App\Http\Controllers\DanhSachSanPhamController;
use App\Http\Controllers\HomeController;

// Updated to DanhMucController


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

// Frontend Routes
Route::get('/', function () {
    return view('frontend.index');
})->name('home');

Route::get('/shop', function () {
    return view('frontend.shop');
})->name('shop');

Route::get('/blog', function () {
    return view('frontend.blog');
})->name('blog');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/cart', function () {
    return view('frontend.cart');
})->name('cart');

Route::get('/sproduct', function () {
    return view('frontend.sproduct');
})->name('sproduct');

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::controller(ProductController::class)
    ->name('products.')
    ->prefix('products/')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });


    Route::get('/product/detail/{id}', [ChiTietSanPhamController::class, 'chitietSanPham'])
    ->name('product.detail');

// Route::get('/products', [DanhSachSanPhamController::class, 'danhSachSanPham'])
//     ->name('index');



//
Route::controller(CartController::class)
    ->name('cart.')
    ->prefix('cart/')
    ->group(function () {
        Route::get('/list', 'listCart')->name('list');
        Route::post('/add', 'addCart')->name('add');
        Route::post('/update', 'updateCart')->name('update');
    });
//
Route::controller(OrderController::class)
    ->name('orders.')
    ->prefix('orders/')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
    });

//

// Routes for DanhMucController
Route::controller(DanhMucController::class)
    ->name('danhmucs.')
    ->prefix('danhmucs/')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });


    Route::controller(OrderController::class)
    ->name('donhangs.')
    ->prefix('donhangs/')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
    });


    Route::controller(DonHangController::class)
    ->name('donhangad.')
    ->prefix('donhangad/')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show{id}', 'show')->name('show');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });


    Route::controller(HomeController::class)
    ->group(function () {
        Route::get('/', 'home')->name('home');
        Route::get('/shop', 'shop')->name('shop');
        //hient thi theo danh muc
        Route::get('/danh-muc/{slug}', [HomeController::class, 'sanphamtheodanhmuc'])->name('sanphamtheodanhmuc');

        Route::get('/san-pham/{slug}', [HomeController::class, 'chitietsanpham'])->name('chitietsanpham');
        Route::get('/blog', 'blog')->name('blog'); 
        Route::get('/about', 'about')->name('about');
        Route::get('/contact', 'contact')->name('contact'); 
    });
