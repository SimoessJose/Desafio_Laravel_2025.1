<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/showUser', [UserController::class, 'showUser']);
Route::get('/showAdmin', [AdminController::class, 'showAdmin']);