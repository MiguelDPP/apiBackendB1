<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AuthController;

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


Route::middleware(['auth:sanctum'])->group(function(){

    Route::get('foods', [FoodController::class,'index']);
    Route::post('food/store', [FoodController::class,'store']);
    Route::get('logout', [AuthController::class, 'logout']);
});