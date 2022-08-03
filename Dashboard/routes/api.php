<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\Admin\Auth\LoginController;
use App\Http\Controllers\Api\Admin\Auth\RegisterController;
use App\Http\Controllers\Api\Admin\Auth\VerificationController;

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


Route::prefix('dashboard')->group(function(){
    Route::prefix('products')->middleware('admin.verified')->controller(ProductController::class)->group(function(){
        Route::get('/','index');
        Route::get('/create','create');
        Route::post('/store','store');
        Route::get('/{product}/edit','edit');
        Route::post('/{product}/update','update');
        Route::post('/{product}/destroy','destroy');
    });
    Route::resource('brands',BrandController::class)->except('create','show')->middleware('admin.verified');
    Route::prefix('admins')->group(function(){
        Route::post('register',RegisterController::class);
        Route::post('login',[LoginController::class,'login']);
        Route::prefix('code')->middleware('auth:sanctum')->group(function(){
            Route::post('send',[VerificationController::class,'send']);
            Route::post('verify',[VerificationController::class,'verify']);
        });
        Route::prefix('logout/tokens')->middleware('admin.verified')->group(function(){
            Route::post('current',[LoginController::class,'logoutCurrentToken']);
            Route::post('other',[LoginController::class,'logoutOtherToken']);
            Route::post('all',[LoginController::class,'logoutAllTokens']);
        });
    });
});



