<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\TodoController;
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


Route::post('/register',[RegisterController::class,'index']);
Route::post('/login',[LoginController::class,'index'])->name('login');


Route::group(['middleware' => ['auth:sanctum']],function (){
  Route::resource('/todo', TodoController::class);
  Route::post('/logout',[LoginController::class,'logout']);
});