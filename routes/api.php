<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\MaterialController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductFilterController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\StyleController;
use App\Http\Controllers\Api\UserController;
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

Route::get('artisans',[UserController::class,'indexArtisan']);
Route::get('artisans/{id}',[UserController::class,'showArtisan']);

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

//Filters
//Route::get('products/filter', [ProductFilterController::class, 'filter']);
Route::get('products/filter/{categoryId?}/{styleId?}/{materialId?}', [ProductFilterController::class, 'filter']);
Route::get('products/user/{userId}', [ProductController::class, 'productsByUserId']);

//Artisan or Owner only
Route::post('products',[ProductController::class,'store']);
Route::delete('products/{id}',[ProductController::class,'destroy']);
Route::put('products/{id}',[ProductController::class,'update']);

//Invoices
Route::get('invoices',[InvoiceController::class,'index']);
Route::get('invoices/{id}',[InvoiceController::class,'show']);
Route::post('invoices',[InvoiceController::class,'store']);
Route::delete('invoices/{id}',[InvoiceController::class,'destroy']);
Route::put('invoices/{id}',[InvoiceController::class,'update']);

//Styles
Route::apiResource('style', StyleController::class);
Route::get('style',[StyleController::class,'index']);

//Categories
Route::apiResource('category', CategoryController::class);
Route::get('category',[CategoryController::class,'index']);

//Materials
Route::apiResource('material', MaterialController::class);
Route::get('material',[MaterialController::class,'index']);

//old filters routes
//Route::get('products/style/{id}',[StyleController::class,'__invoke']);
//Route::get('products/category/{id}',[CategoryController::class,'__invoke']);
//Route::get('products/material/{id}',[MaterialController::class,'__invoke']);





