<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('admin/login',function(){
    return response()->json(['success'=>true]);
});

Route::get('dashboard/products',[ProductController::class,'index']);
Route::get('dashboard/products/create',[ProductController::class,'create']);
Route::post('dashboard/products/store',[ProductController::class,'store']);
Route::get('dashboard/products/{product}/edit',[ProductController::class,'edit']);
Route::post('dashboard/products/{product}/update',[ProductController::class,'update']);
Route::post('dashboard/products/{product}/destroy',[ProductController::class,'destroy']);


Route::resource('brands',BrandController::class)->except('create','show');
