<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user.landingPage');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/usersTable', [UserController::class, 'index'])->name('userIndex');
Route::get('/adminsTable', [AdminController::class, 'index'])->name('adminIndex');
Route::get('/produtsTable', [ProductController::class, 'index'])->name('productIndex');
Route::get('/landingPage', [ProductController::class, 'search'])->name('index');
Route::get('/search', [ProductController::class, 'search'])->name('productsSearch');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('user.productView');
Route::get('/updateProfile/{user}', [UserController::class, 'edit'])->name('editProfile');
Route::get('/viewProfile/{user}', [UserController::class, 'view'])->name('viewProfile');
Route::put('/updateProfile/{user}', [UserController::class, 'update'])->name('updateUser');
require __DIR__.'/auth.php';
