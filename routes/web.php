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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

Route::resource('presentations', \App\Http\Controllers\PresentationController::class);

Route::get('/users/update', [App\Http\Controllers\UserController::class, 'updateForm'])->name('users.update-form');

Route::post('/users/update', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

Route::get('/users/delete', [App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');

Route::get('/presentations/create', [App\Http\Controllers\PresentationController::class, 'create'])->name('presentation.update-form');

