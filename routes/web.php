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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('password/reset', function () {
    return view('auth.passwords.email');
})->name('password.reset');

Route::get('/profile', function () {
    return view('auth.profile');
})->name('profile.edit');

Route::get('/change-password', function () {
    return view('auth.passwords.change');
})->name('auth.password.edit');
