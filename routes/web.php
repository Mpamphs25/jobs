<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use \App\Models\Job;
use \App\Models\User;

Route::get('/', function () {
    return redirect('jobs');
});


Route::Resource('jobs',JobController::class);