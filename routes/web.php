<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('jobs');
});


Route::Resource('jobs',JobController::class)->only(['index', 'show']);

Route::get('login', fn()=>to_route('auth.create'))->name('login');
Route::Resource('auth',AuthController::class)->only(['create', 'store']);

Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('dashboard',fn()=> view('dashboard'))->middleware('auth')->name('dashboard');