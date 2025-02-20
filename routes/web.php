<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\BuyController;
use App\Http\Controllers\Front\RentalController;
use App\Http\Controllers\Front\LoginController;


Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('admin');
Route::get('/buy', [BuyController::class, 'index'])->name('buy');
Route::get('/rental', [RentalController::class, 'index'])->name('rental');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/signup', [LoginController::class, 'ShowRegistration'])->name('signup');



Route::post('/login',[LoginController::class,'login'])->name('user.login');


Route::post('/store',[LoginController::class,'store'])->name('user.store');

Route::get('/logout',[LoginController::class,'logout'])->name('logout');
