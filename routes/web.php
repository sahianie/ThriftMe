<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\BuyController;
use App\Http\Controllers\Front\RentalController;
use App\Http\Controllers\Admin\RentalPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\LoginController;


Route::get('/', [HomeController::class, 'index'])->name('home');

///////////////////  Main Categories ///////////////

Route::get('/buy', [BuyController::class, 'index'])->name('buy');
Route::get('/rental', [RentalController::class, 'index'])->name('rental');


///////////////////  ViewRentalPosts Routes  ///////////////

Route::get('/rentals/{category_id}', [RentalController::class, 'Filterbycategory'])->name('rentals.bycategory');
Route::get('/rentalDetail/{rental_id}', [RentalController::class, 'Rentaldetail'])->name('rental.detail');
Route::get('/rentalOrder/{rental_id}', [RentalController::class, 'Rentalorder'])->name('rental.order');
Route::post('/rentalOrderstore', [RentalController::class, 'storeRentalOrder'])->name('rental.order.store');

/////////////////// Authentication  ///////////////

Route::get('/login', [LoginController::class, 'loginpage'])->name('login');
Route::get('/signup', [LoginController::class, 'ShowRegistration'])->name('signup');
Route::post('/login',[LoginController::class,'login'])->name('user.login');
Route::post('/store',[LoginController::class,'store'])->name('user.store');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::group(['prefix' => 'admin','middleware'=>'admin'], function ()
{
Route::get('/',[AdminDashboardController::class,'index'])->name('admin.dashboard');
///////////////////  Category Routes  ///////////////

Route::get('/indexCategory',[CategoryController::class,'index'])->name('index.category');
Route::get('/createCategory',[CategoryController::class,'create'])->name('create.category');
Route::post('/storeCategory',[CategoryController::class,'store'])->name('store.category');
Route::get('/editCategory/{id}',[CategoryController::class,'edit'])->name('edit.category');
Route::post('/updateCategory/{id}',[CategoryController::class,'update'])->name('update.category');
Route::any('/deleteCategory/{id}',[CategoryController::class,'destroy'])->name('delete.category');

///////////////////  Rental Routes  ///////////////

Route::get('/createRental',[RentalPostController::class,'create'])->name('create.rental');
Route::get('/indexRental',[RentalPostController::class,'index'])->name('index.rental');
Route::post('/storeRental',[RentalPostController::class,'store'])->name('store.rental');
Route::get('/editRental/{id}',[RentalPostController::class,'edit'])->name('edit.rental');
Route::post('/updateRental/{id}',[RentalPostController::class,'update'])->name('update.rental');
Route::any('/deleteRental/{id}',[RentalPostController::class,'destroy'])->name('delete.rental');

});

