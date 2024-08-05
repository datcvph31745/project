<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
<<<<<<< HEAD
use App\Http\Controllers\ChiTietSanPhamController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrDerController;






=======
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DanhMucController; // Đảm bảo thêm controller này
>>>>>>> dat

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
    return view('frontend.index');
})->name('home');

Route::get('/shop', function () {
    return view('frontend.shop');
})->name('shop');

<<<<<<< HEAD
    // Route::get('/sproduct', function () {
    //     return view('frontend.sproduct');
    // })->name('sproduct');
    
=======
Route::get('/blog', function () {
    return view('frontend.blog');
})->name('blog');
>>>>>>> dat

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

<<<<<<< HEAD
    //
// Route::controller(UserController::class)
//     ->group(function (){
//         Route::get('/register', 'register')->name('register');
//         Route::post('/register', 'postRegister')->name('postRegister');
//     });
// Route::get('login', [UserController::class, 'login'])
//     ->name('login');
// Route::post('login', [UserController::class, 'postLogin'])
//     ->name('postLogin');
// Route::post('logout', [UserController::class, 'logout'])
//     ->name('logout');





=======
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Routes for ProductController
>>>>>>> dat
Route::controller(ProductController::class)
    ->name('products.')
    ->prefix('products/')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
<<<<<<< HEAD
        Route::get('/{id}/edit', 'edit')
        ->name('edit');
        Route::put('/{id}/update', 'update')
        ->name('update');
        Route::delete('/{id}/destroy', 'destroy')
        ->name('destroy');

});  

Route::get('/product/detail/{id}', [ChiTietSanPhamController::class, 'chitietSanPham'])
->name('product.detail');

Route::get('/list-cart', [CartController::class, 'listCart'])->name('cart.list');
Route::post('/add-to-cart', [CartController::class, 'addCart'])->name('cart.add');
Route::post('/update-cart', [CartController::class, 'updateCart'])->name('cart.update');

// don hangf

Route::controller(OrDerController::class)
    ->name('donhangs.')
    ->prefix('donhangs/')
    ->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')
        ->name('edit');
        Route::put('/{id}/update', 'update')
        ->name('update');


});  





=======
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });
>>>>>>> dat

// Routes for DanhMucController (formerly ProductController)
Route::controller(DanhMucController::class) // Sửa thành DanhMucController
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
