<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});

Route::get('/users',[UsersController::class, 'index']);
Route::get('/users/{id}',[UsersController::class, 'show']);
Route::post('/users',[UsersController::class, 'store']);
Route::put('/users/{id}',[UsersController::class, 'update']);
Route::delete('/users/{id}',[UsersController::class, 'index']);