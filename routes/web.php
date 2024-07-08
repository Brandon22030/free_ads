<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Middleware\DontPass;
use Illuminate\Auth\Events\Registered;

Route::get('/logout', [LogoutController::class, 'destroy'])->middleware('auth')->name('logout');




Route::get('/profile', [RegisterController::class, 'show'])->middleware('auth')->name('auth.my_account');

Route::get('/profile/edit/{id}', [RegisterController::class, 'edit'])->middleware('auth')->name('auth.edit_user');

Route::put('/profile/edit/{id}', [RegisterController::class, 'update'])->middleware('auth')->name('auth.update_user');

Route::get('/profile/delete/{id}', [RegisterController::class, 'destroy'])->middleware('auth')->name('auth.delete_user');

Route::get('forgetPasswordLink', function () {

    return view('auth/forgetPasswordLink');
});



Route::get('/home', [PostController::class, "filter"])->middleware('verified')->name("home");

Route::get('/', [PostController::class, "filter"])->name("prem_home");

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/home_product', [PostController::class, 'home'])->middleware('auth')->name('home_product');


Route::get('/create-form-post', [PostController::class, 'createFormPost'])->middleware('auth')->name('create-form-post');


Route::post('/creat', [PostController::class, 'creat'])->middleware('auth')->name('creat');


Route::get('/show/{id}', [PostController::class, 'show'])->middleware('auth')->name('show');


Route::put('/show/{id}', [PostController::class, 'update'])->middleware('auth')->name('update');


Route::get('/delete/{id}', [PostController::class, 'delete'])->middleware('auth')->name('delete-post');

Route::middleware([DontPass::class])->group(function () {

    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::post('/login', [LoginController::class, 'store'])->name('login');
    Route::get('/login', [LoginController::class, 'create']);


});

Route::get('/email/verify', [RegisterController::class, 'verifyNotice'])->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verifyEmail'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [RegisterController::class, 'verifyHandler'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/product-content/{id}', [PostController::class, 'content'])->name('product_content');