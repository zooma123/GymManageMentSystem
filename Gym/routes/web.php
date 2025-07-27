<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\SubscribtionController;

Route::get('/', function () {
    return view('welcome');
});



Route::post('/auth/register', [UserController::class , 'Register']);
Route::post('/auth/login', [UserController::class , 'Login']);
Route::post('/user/CreateUser', [UserController::class , 'CreateUser'])->middleware('auth:sanctum')->middleware('RoleMiddleware');
Route::delete('/user/DeleteUser/{userid}', [UserController::class , 'DeleteUser'])->middleware('auth:sanctum')->middleware('RoleMiddleware');

Route::post('/CreateSubsCription' , [SubscribtionController::class , 'CreateSubscription'])->middleware('auth:sanctum')->middleware('RoleMiddleware');



Route::post('/MakeUserSubscription' , [SubscribtionController::class , 'MakeUserSubscription'])->middleware('auth:sanctum')->middleware('RoleMiddleware');

Route::get('/UserSubscription/{id}' , [SubscribtionController::class , 'UserSubscription'])->middleware('auth:sanctum')->middleware('RoleMiddleware');



Route::post('/CheckForEntry/{id}' , [SubscribtionController::class , 'CheckForEntry']);


Route::get('/barcode/{id}', [SubscribtionController::class, 'showbarcode'])->name('barcode.show');
