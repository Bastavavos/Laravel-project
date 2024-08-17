<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BusinessController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\ProductController;
<<<<<<< Updated upstream
use App\Http\Controllers\Api\ProductFilterController;
=======
use App\Http\Controllers\Api\RoleController;
>>>>>>> Stashed changes
use App\Http\Controllers\Api\StyleController;
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


//Users
Route::group(['middleware'=>'auth:sanctum'], function () {
Route::apiResource('user', UserController::class);
Route::apiResource('invoice', InvoiceController::class);
});
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'login']);
//Route::middleware(['auth:sanctum'])->post('auth/login', [AuthController::class, 'login']);
Route::middleware(['auth:sanctum'])->post('auth/logout', [AuthController::class, 'logout']);

Route::get('users',[UserController::class,'index']);
Route::get('users/{id}',[UserController::class,'show']);
Route::put('users/{id}', [AuthController::class, 'updateUser']);
Route::delete('users/{id}',[UserController::class,'destroy']);

//Location
Route::get('/zip-codes', [LocationController::class, 'getZipCodes']);
Route::get('/cities', [LocationController::class, 'getCities']);
Route::get('/cities/{id}', [LocationController::class, 'showCity']);

//Roles
Route::get('/roles', [RoleController::class, 'index']);

//Products
Route::apiResource('product', ProductController::class);
Route::get('products',[ProductController::class,'index']);
Route::get('products/{id}',[ProductController::class,'show']);
Route::post('products',[ProductController::class,'store']);
Route::delete('products/{id}',[ProductController::class,'destroy']);
Route::put('products/{id}',[ProductController::class,'update']);

<<<<<<< Updated upstream
//Filters
Route::get('products/filter/{categoryId?}/{styleId?}/{materialId?}', [ProductFilterController::class, 'filter']);

//Businesses
Route::apiResource('business', BusinessController::class);
Route::get('business',[BusinessController::class,'index']);
Route::get('business/{id}',[BusinessController::class,'show']);
Route::post('business',[BusinessController::class,'store']);
Route::delete('business/{id}',[BusinessController::class,'destroy']);
Route::put('business/{id}',[BusinessController::class,'update']);
=======
//Styles
Route::apiResource('style', StyleController::class);
Route::get('style',[StyleController::class,'index']);
Route::get('products/style/{id}',[StyleController::class,'__invoke']);

//Categories
Route::apiResource('category', CategoryController::class);
Route::get('category',[CategoryController::class,'index']);
Route::get('products/category/{id}',[CategoryController::class,'__invoke']);

//Materials
Route::apiResource('material', MaterialController::class);
Route::get('material',[MaterialController::class,'index']);
Route::get('products/material/{id}',[MaterialController::class,'__invoke']);
>>>>>>> Stashed changes

//Invoices
Route::get('invoices',[InvoiceController::class,'index']);
Route::get('invoices/{id}',[InvoiceController::class,'show']);
Route::post('invoices',[InvoiceController::class,'store']);
Route::delete('invoices/{id}',[InvoiceController::class,'destroy']);
Route::put('invoices/{id}',[InvoiceController::class,'update']);

//Styles
//Route::apiResource('style', StyleController::class);
//Route::get('style',[StyleController::class,'index']);
//Route::get('products/style/{id}',[StyleController::class,'__invoke']);

//Categories
//Route::apiResource('category', CategoryController::class);
//Route::get('category',[CategoryController::class,'index']);
//Route::get('products/category/{id}',[CategoryController::class,'__invoke']);

//Materials
//Route::apiResource('material', MaterialController::class);
//Route::get('material',[MaterialController::class,'index']);
//Route::get('products/material/{id}',[MaterialController::class,'__invoke']);


