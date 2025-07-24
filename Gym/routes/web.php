<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
});



Route::post('/auth/register', [UserController::class , 'Register']);
Route::post('/auth/login', [UserController::class , 'Login']);
Route::post('/user/CreateUser', [UserController::class , 'CreateUser'])->middleware('auth:sanctum')->middleware('RoleMiddleware');
Route::post('/user/DeleteUser/{userid}', [UserController::class , 'DeleteUser'])->middleware('auth:sanctum')->middleware('RoleMiddleware');
