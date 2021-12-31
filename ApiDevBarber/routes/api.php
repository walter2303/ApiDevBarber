<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarberController;


Route::get('/ping', function(){
    return['pong'=>true];
});

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::get('/random', [BarberController::class], 'createRandom');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/refresh', [AuthController::class, 'refresh']);
Route::post('/user', [AuthController::class, 'create']);
//Route::post('/user', [AuthController::class, 'create'])->name('create');

Route::get('/user', [UserController::class, 'read']);
Route::put('/user', [UserController::class, 'update']);
Route::get('/user/favorities', [UserController::class, 'getfavorities']);
Route::post('/user/favorite', [UserController::class, 'addfavorite']);
Route::get('/user/appointments', [UserController::class, 'getappointments']);



Route::get('/barbers', [BarberController::class, 'list']);
Route::get('/barber/{id}', [BarberController::class, 'one']);
Route::post('/barber/{id}/appointment',[BarberController::class, 'setappointment' ]);

Route::get('/search', [BarberController::class,'search']);



