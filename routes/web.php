<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'logout'])->name('home.logout');
Route::get('login', [LoginController::class, 'show'])->name('login.show');
Route::post('login', [LoginController::class, 'login'])->name('login.login');

Route::get('sign-up', [RegistrationController::class, 'create'])->name('sign-up.create');
Route::post('sign-up', [RegistrationController::class, 'store'])->name('sign-up.store');

Route::get('cart', function () {
    return view('pages.cart.index');
})->name('cart');

Route::get('wish-list', function () {
    return view('pages.wish-list.index');
})->name('wish-list');

Route::get('account', function () {
    return view('pages.account.index');
})->name('account');

Route::get('payment-methods', function () {
    return view('pages.payment-methods.index');
})->name('payment-methods');

Route::get('about-us', function () {
    return view('pages.about-us.index');
})->name('about-us');

Route::get('contact-us', function () {
    return view('pages.contact-us.index');
})->name('contact-us');
