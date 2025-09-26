<?php

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;




Route::get('/', [ChirpController::class, 'index']);
Route::middleware('auth')->group(function(){
    Route::post('/chirps', [ChirpController::class, 'store']);
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);
});

Route::post("/logout", Logout::class)->middleware('auth');


Route::view("/login", 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post("/login", Login::class)->middleware('guest');



Route::view('/register', 'auth.register')
->middleware('guest')
->name('register');
Route::post('/register', Register::class)
->middleware('guest');




