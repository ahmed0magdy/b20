<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

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
// Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
// Route::get('dashboard/products',[ProductController::class,'index'])->name('dashboard.products.index');
// Route::get('dashboard/products/create',[ProductController::class,'create'])->name('dashboard.products.create');
// Route::get('dashboard/products/{id}/edit',[ProductController::class,'edit'])->name('dashboard.products.edit');
// Route::post('dashboard/products/store',[ProductController::class,'store'])->name('dashboard.products.store');
// Route::put('dashboard/products/{id}/update',[ProductController::class,'update'])->name('dashboard.products.update');
// Route::delete('dashboard/products/{id}/destroy',[ProductController::class,'destroy'])->name('dashboard.products.destroy');



Route::prefix('dashboard')->middleware('verified')->name('dashboard')->group(function(){
    Route::get('/',[DashboardController::class,'index']);
    Route::controller(ProductController::class)->prefix('products')->name('.products.')->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::get('/{product}/edit','edit')->name('edit');
        Route::post('/store','store')->name('store');
        Route::put('/{product}/update','update')->name('update');
        Route::delete('/{product}/destroy','destroy')->name('destroy');
    });
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
