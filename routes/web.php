<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AxiosReceiverController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ExitController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Auth::routes();
Route::middleware(['auth', 'role'])->group(function () {
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');
Route::get('/dashboard/product',[ProductController::class,'index'])->name('dashboard.productList');
Route::get('/dashboard/users',[UserController::class,'index'])->name('dashboard.users');
Route::get('/dashboard/product/productform',[ProductController::class,'showAddProduct'])->name('productform');
Route::post('/dashboard/product/productform/add',[ProductController::class,'addProduct'])->name('addProduct');
Route::get('/dashboard/product/{id}/delete',[ProductController::class,'destroy'])->name('product.delete');
Route::get('/dashboard/product/{id}/update',[ProductController::class,'showUpdateProduct'])->name('product.update');
Route::post('/dashboard/product/update',[ProductController::class,'updateProduct'])->name('product.postupdate');
Route::get('/dashboard/comments',[CommentController::class,'index'])->name('dashboard.comments');
Route::get('/dashboard/comments/{id}/delete',[CommentController::class,'destroy'])->name('comment.delete');
Route::get('/dashboard/users/addAdminForm',[UserController::class,'addAdminForm'])->name('dashboard.addAdmin');
Route::post('/dashboard/users/addAdminForm',[UserController::class,'store'])->name('dashboard.postaddAdmin');
Route::get('/dashboard/users/{id}/delete',[UserController::class,'destroy'])->name('user.delete');
Route::get('/dashboard/messages',[MessageController::class,'dashboardIndex']);
});
Route::middleware(['auth'])->group(function () {
    Route::get('user/{id}/updateProfile',[UserController::class,'showUpdateForm'])->name('user.updateProfile');
    Route::post('user/updateProfile',[UserController::class,'update'])->name('user.postupdateProfile');
    
});
// Route::get('/accueil')
Route::get('/search',[ProductController::class,'search'])->name('search');

Route::get('/cart/{id}',[ShoppingCartController::class,'addProductToCart']);

Route::post('/sendrequest', [AxiosReceiverController::class,'ReceiveIt'])->name('sendrequest');

Route::get('/contactus',[MessageController::class,'index'])->name('show.contactus');
Route::post('/sendmessage',[MessageController::class,'store'])->name('sendmessage');
Route::get('/aboutUs',[HomeController::class,'aboutUs']);
Route::post('/shoppingcart',[ShoppingCartController::class,'index']);
Route::get('/shoppingcart',[ShoppingCartController::class,'index']);
Route::get('/faq',function(){
    return view('layouts/faq');
});
Route::get('/privacy',function(){
    return view('layouts/privacy');
});
Route::get('/terms&conditions',function(){
    return view('layouts/terms');
});
Route::get('/returnpolicy',function(){
    return view('layouts/returnpolicy');
});


