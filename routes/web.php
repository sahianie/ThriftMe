<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Front\ThriftController;
use App\Http\Controllers\Front\RentalController;
use App\Http\Controllers\Admin\RentalPostController;
use App\Http\Controllers\Admin\ThriftPostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Front\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');

///////////////////  Feedback  ///////////////

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/feedbackStore', [FeedbackController::class, 'store'])->name('feedback.store');

///////////////////  Main Categories ///////////////

Route::get('/thrift', [ThriftController::class, 'index'])->name('thrift');
Route::get('/rental', [RentalController::class, 'index'])->name('rental');

///////////////////  ViewRentalPosts  ///////////////

Route::get('/rentals/{category_id}', [RentalController::class, 'Filterbycategory'])->name('rentals.bycategory');
Route::get('/rentalDetail/{rental_id}', [RentalController::class, 'Rentaldetail'])->name('rental.detail');
Route::get('/rentalOrder/{rental_id}', [RentalController::class, 'Rentalorder'])->name('rental.order');
Route::post('/rentalOrderstore', [RentalController::class, 'storeRentalOrder'])->name('rental.order.store');

///////////////////  ViewThriftPosts  ///////////////

Route::get('/thrifts/{category_id}', [ThriftController::class, 'FilterByCategory'])->name('thrift.bycategory');
Route::get('/thriftDetail/{thrift_id}', [ThriftController::class, 'ThriftDetail'])->name('thrift.detail');
Route::get('/thriftOrder/{thrift_id}', [ThriftController::class, 'ThriftOrder'])->name('thrift.order');
Route::post('/thriftOrderstore', [ThriftController::class, 'storeThriftOrder'])->name('thrift.order.store');

/////////////////// Authentication  ///////////////

Route::get('/login', [LoginController::class, 'loginpage'])->name('login');
Route::get('/signup', [LoginController::class, 'ShowRegistration'])->name('signup');
Route::post('/login',[LoginController::class,'login'])->name('user.login');
Route::post('/store',[LoginController::class,'store'])->name('user.store');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

///////////////////   Admin Show_Notification  ///////////////

Route::group(['prefix' => 'admin','middleware'=>'admin'], function ()
{

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/notification', [OrderController::class, 'notification'])->name('index.notification');
Route::post('/admin/notification/read/{id}', [OrderController::class, 'markAsRead'])->name('markAsRead');
Route::get('/rental-orders', [OrderController::class, 'rentalOrders'])->name('rental.orders');
Route::get('/thrift-orders', [OrderController::class, 'thriftOrders'])->name('thrift.orders');
Route::delete('/rental-orders/{id}', [OrderController::class, 'rentaldestroy'])->name('rental-orders.destroy');
Route::delete('/sold/{id}', [OrderController::class, 'thriftdestroy'])->name('sold.destroy');

///////////////////  Category  ///////////////

Route::get('/indexCategory',[CategoryController::class,'index'])->name('index.category');
Route::get('/createCategory',[CategoryController::class,'create'])->name('create.category');
Route::post('/storeCategory',[CategoryController::class,'store'])->name('store.category');
Route::get('/editCategory/{id}',[CategoryController::class,'edit'])->name('edit.category');
Route::post('/updateCategory/{id}',[CategoryController::class,'update'])->name('update.category');
Route::any('/deleteCategory/{id}',[CategoryController::class,'destroy'])->name('delete.category');

///////////////////  Rental  ///////////////

Route::get('/createRental',[RentalPostController::class,'create'])->name('create.rental');
Route::get('/indexRental',[RentalPostController::class,'index'])->name('index.rental');
Route::post('/storeRental',[RentalPostController::class,'store'])->name('store.rental');
Route::get('/editRental/{id}',[RentalPostController::class,'edit'])->name('edit.rental');
Route::post('/updateRental/{id}',[RentalPostController::class,'update'])->name('update.rental');
Route::any('/deleteRental/{id}',[RentalPostController::class,'destroy'])->name('delete.rental');

///////////////////  Thrift  ///////////////

Route::get('/createThrift', [ThriftPostController::class, 'create'])->name('create.thrift');
Route::get('/indexThrift', [ThriftPostController::class, 'index'])->name('index.thrift');
Route::post('/storeThrift', [ThriftPostController::class, 'store'])->name('store.thrift');
Route::get('/editThrift/{id}', [ThriftPostController::class, 'edit'])->name('edit.thrift');
Route::put('/updateThrift/{id}', [ThriftPostController::class, 'update'])->name('update.thrift');
Route::any('/deleteThrift/{id}', [ThriftPostController::class, 'destroy'])->name('delete.thrift');

});

///////////////////  Favourite   ///////////////

Route::middleware('auth')->group(function () {
    Route::post('/favourite/rental/{rental}', [FavouriteController::class, 'addRental'])->name('favourite.rental');
    Route::delete('/favourite/rental/{rental}', [FavouriteController::class, 'removeRental'])->name('unfavourite.rental');

    Route::post('/favourite/thrift/{thrift}', [FavouriteController::class, 'addThrift'])->name('favourite.thrift');
    Route::delete('/favourite/thrift/{thrift}', [FavouriteController::class, 'removeThrift'])->name('unfavourite.thrift');

    Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites.index');
});


