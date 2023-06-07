<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StudentController;

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


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('getUserWithID', [AuthController::class, 'getUserWithID']);


Route::get('foods', [FoodController::class,'index']);
Route::get('students', [StudentController::class,'index']);
Route::post('findClient', [StudentController::class,'findClient']);

Route::get('orders', [OrderController::class,'index']);
Route::post('getOrder', [OrderController::class,'getOrder']);
Route::post('createOrder', [OrderController::class,'createOrder']);
Route::post('getOrdersByClient', [OrderController::class,'getOrdersByClient']);
Route::post('food/store', [FoodController::class,'store']);

Route::middleware(['auth:sanctum'])->group(function(){
  
    Route::get('logout', [AuthController::class, 'logout']);
});