<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SupplyAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPassController;
use App\Http\Controllers\LoadMoreDataController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\aProductController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\profile\MyOrdersController;
use App\Http\Controllers\profile\UserProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Password;

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

Route::get('products', [AuthController::class, 'index'])->name('main');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::post('showProducts', [AuthController::class, 'productlist'])->name('products.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('products-search', [AuthController::class,'search'])->name('products.search');

Route::get('admin', [AdminController::class, 'index'])->name('admin-main')->middleware('admin');
Route::get('supply', [SupplyAdminController::class, 'index'])->name('supply')->middleware('admin');
Route::get('/products/create', [ProductController::class, 'create'])->name('addProduct')->middleware('admin');
Route::post('/create-product', [ProductController::class, 'createProd'])->name('create.post')->middleware('admin');

Route::get('/products/{post}', [aProductController::class, 'show'])->name('show.post');

Route::get('cart', [CookieController::class, 'index'])->name('cart');
Route::post('cartCookie', [CookieController::class, 'setCookie'])->name('cartCookie.set');
Route::resource('product', CookieController::class);
Route::resource('remove', ShoppingCartController::class);

Route::get('profile', [UserProfileController::class, 'index'])->name('profile')->middleware('user');
Route::get('profile/edit', [UserProfileController::class, 'edit'])->name('users.edit-profile')->middleware('user');
Route::put('profile/edit', [UserProfileController::class, 'update'])->name('users.update-profile')->middleware('user');
Route::get('orders', [MyOrdersController::class, 'index'])->name('orders')->middleware('user');

Route::get('points', [RatingController::class, 'index'])->name('points')->middleware('user');
Route::resource('rating', RatingController::class);

Route::get('forget-password', [ForgetPassController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgetPassController::class, 'submitForm'])->name('forget.password.post');
Route::get('reset-password', [ForgetPassController::class, 'showResetPasswordForm'])->name('reset.password.get'); // reset-password/{token}
//Route::post('reset-password', [ForgetPassController::class, 'submitResetForm'])->name('reset.password.post');
Route::post('reset-password', [ForgetPassController::class, 'recoverPass'])->name('reset.password.post');

//Route::get('/', [CrudController::class, 'index']);
//Route::resource('todo', CrudController::class);
