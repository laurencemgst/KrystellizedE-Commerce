<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/',[HomeController::class,'index']);
Route::get('/product',[AdminController::class,'product']);
Route::post('/uploadproduct',[AdminController::class,'uploadproduct']);
Route::get('/showproduct',[AdminController::class,'showproduct']);
Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);
Route::get('/updateproductview/{id}',[AdminController::class,'updateproductview']);
Route::post('/updateproduct/{id}',[AdminController::class,'updateproduct']);
Route::get('/search',[HomeController::class,'search']);
Route::post('/addtocart/{id}',[ProductController::class,'addtocart']);
Route::get('/showCart',[ProductController::class,'showCart']);
Route::get('/delete/{id}',[ProductController::class,'deletecart']);
Route::post('/orderconfirmed',[ProductController::class,'orderconfirmed']);
Route::get('/showorder',[AdminController::class,'showorder']);
Route::post('/updatestatus/{id}',[AdminController::class,'updatestatus']);
Route::get('/OurProducts',[ProductController::class,'OurProducts']);
Route::get('/AboutUs',[HomeController::class,'AboutUs']);
Route::get('/Contact',[HomeController::class,'Contact']);
Route::get('/TrackOrder',[HomeController::class,'TrackOrder']);
Route::get('/requestCancel/{id}',[HomeController::class,'requestCancel']);