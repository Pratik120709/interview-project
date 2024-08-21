<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'login')->name('login');
    Route::view('/sign-up', 'register')->name('sign.up');

    Route::post('/login-user', [AuthController::class, 'loginProcess'])->name('form.login')->middleware('throttle:2,1');
    Route::post('/sign-up', [AuthController::class, 'registerProcess'])->name('form.register')->middleware('throttle:2,1');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'homePage'])->name('home.page');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/store-product', [HomeController::class, 'store'])->name('store');
    Route::get('/product', [HomeController::class, 'show'])->name('show');

    Route::get('/edit/{id}', [HomeController::class,'edit'])->name('edit');
  
    Route::post('/update/{id}',[HomeController::class, 'update'])->name('update');

    Route::get('/preview/{id}', [HomeController::class,'ProductPreview'])->name('product.preview');

});