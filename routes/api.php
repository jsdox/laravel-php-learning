<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function (Request $request) {
    return $request->all();
});//->middleware('auth:sanctum');

Route::controller(UserController::class)->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout');
//    Route::get('me', 'me');
    Route::post('users', 'saveUser');
    Route::get('users', 'users');
    Route::get('users/{id}', 'getUser');
    Route::put('users/{id}', 'updateUser');
    Route::delete('users/{id}', 'deleteUser');

} );