<?php

use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users',[UserController::class,'index']);
Route::get('users/{id}',[UserController::class,'show']);
Route::post('users',[UserController::class,'store']);
Route::delete('users/{id}',[UserController::class,'delete']);
Route::put('users/{id}',[UserController::class,'update']);

Route::get('products',[ProductController::class,'index']);
Route::get('products/{id}',[ProductController::class,'show']);
Route::post('products',[ProductController::class,'store']);
Route::delete('products/{id}',[ProductController::class,'delete']);
Route::put('products/{id}',[ProductController::class,'update']);

Route::get('categories',[CategoryController::class,'index']);
Route::get('categories/{id}',[CategoryController::class,'show']);
Route::post('categories',[CategoryController::class,'store']);
Route::delete('categories/{id}',[CategoryController::class,'destroy']);
Route::put('categories/{id}',[CategoryController::class,'update']);

Route::get('business',[BusinessController::class,'index']);
Route::get('business/{id}',[BusinessController::class,'show']);
Route::post('business',[BusinessController::class,'store']);
Route::delete('business/{id}',[BusinessController::class,'destroy']);
Route::put('business/{id}',[BusinessController::class,'update']);

//Route::apiResource('products', ProductController::class);
//Route::apiResource('business', BusinessController::class);
//Route::apiResource('invoices', InvoiceController::class);
//Route::apiResource('categories', CategoryController::class);
//Route::apiResource('users', UserController::class);
