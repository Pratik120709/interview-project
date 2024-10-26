<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\GoogleAuthController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'login')->name('login');
    Route::view('/sign-up', 'register')->name('sign.up');

    Route::post('/login-user', [AuthController::class, 'loginProcess'])->name('form.login')->middleware('throttle:2,1');
    Route::post('/sign-up', [AuthController::class, 'registerProcess'])->name('form.register')->middleware('throttle:2,1');

    Route::get('/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
    Route::get('/google/callback', [GoogleAuthController::class, 'callbackGoogle'])->name('callbackGoogle');

    Route::get('/github', [GoogleAuthController::class, 'githubRedirect'])->name('github.redirect');
    Route::get('/github/callback', [GoogleAuthController::class, 'callbackgithub'])->name('callbackgithub');
});


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [BlogController::class, 'addBlogPage'])->name('add.blog.view');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/store-product', [BlogController::class, 'store'])->name('store');

    Route::get('/product', [BlogController::class, 'show'])->name('show');

    Route::get('/edit/{id}', [BlogController::class,'edit'])->name('edit');
  
    Route::post('/update/{id}',[BlogController::class, 'update'])->name('update');

    Route::get('/preview/{id}', [BlogController::class,'ProductPreview'])->name('product.preview');

    Route::get('/delete/{id}',[BlogController::class, 'deleteBlog'])->name('blog.delete');

//    user route
    Route::get('/user-roll', [BlogController::class, 'userRollList'])->name('user.roll.list');

    Route::post('/user-roll-add/{id}', [BlogController::class, 'addUserRoll'])->name('add.user.roll');

    Route::get('/edit-user/{id}', [BlogController::class,'editUser'])->name('edit.user');

    Route::post('/update-user/{id}',[BlogController::class, 'updateUser'])->name('update.user');

    Route::get('/delete-user/{id}',[BlogController::class, 'deleteUser'])->name('delete.user');

    Route::post('/search-blog',[BlogController::class, 'searchBlog'])->name('search.data');

});


Route::get('/pay',[RazorpayController::class, 'razorePay'])->name('razore.pay');
Route::post('/pay/checkout',[RazorpayController::class, 'razorePaycheckout'])->name('razorpay.checkout');