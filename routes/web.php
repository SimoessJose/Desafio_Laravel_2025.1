<?php

use App\Http\Controllers\PagSeguroController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\auth_user;
use App\Http\Middleware\auth_admin;
use App\Http\Middleware\Auth_User_AdminMiddleware;
use App\Http\Controllers\ChartController;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Transaction;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user.landingPage');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(auth_admin::class)->group(function () {
    Route::get('/adminsTable', [AdminController::class, 'index'])->name('adminIndex');
    Route::get('/viewAdminProfile/{admin}', [AdminController::class, 'view'])->name('viewAdminProfile');
    Route::get('/createAdminProfile', [AdminController::class, 'viewCreateProfile'])->name('createAdminProfile');
    Route::delete('/delete-admin/{admin}', [AdminController::class, 'destroy'])->name('deleteAdmin');
    Route::post('/storeAdmin', [AdminController::class, 'store'])->name('storeAdminProfile');
    Route::get('/admin/updateAdminProfile/{admin}', [AdminController::class, 'edit'])->name('editAdminProfile');
    Route::put('/updateAdminProfile/{admin}', [AdminController::class, 'update'])->name('updateAdminProfile');
    Route::get('/createProfile', [UserController::class, 'viewCreateProfile'])->name('createProfile');
    Route::post('/storeProfile', [UserController::class, 'store'])->name('storeProfile');
    Route::get('/contact/{user}', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/{user}', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/charts', [ChartController::class, 'index'])->name('chart.index');
});


Route::middleware(auth_user::class)->group(function () {
    Route::get('/payment-error', function () {
        return view('user.paymentError');
    })->name('paymentError');
    Route::post('/checkout', [PagSeguroController::class, 'createCheckout'])->name('checkout');
    Route::get('/createProductProfile', [ProductController::class, 'viewCreateProfile'])->name('createProductProfile');
    Route::post('/storeProduct', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('/withdraw/{user}', [UserController::class, 'withdrawView'])->name('withdrawView');
    Route::put('/withdraw/{user}', [UserController::class, 'withdraw'])->name('withdraw');
    Route::get('/purchase', [TransactionController::class, 'purchase'])->name('purchase');
    Route::get('/relatorioCompras', [TransactionController::class, 'purchasePdf'])->name('relatorioCompras');
});


Route::middleware(Auth_User_AdminMiddleware::class)->group(function () {

    Route::get('/produtsTable', [ProductController::class, 'index'])->name('productIndex');
    Route::get('/landingPage', [ProductController::class, 'search'])->name('index');
    Route::get('/search', [ProductController::class, 'search'])->name('productsSearch');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('user.productView');
    Route::get('/viewProfile/{user}', [UserController::class, 'view'])->name('viewProfile');
    Route::get('/updateProfile/{user}', [UserController::class, 'edit'])->name('editProfile');
    Route::put('/updateProfile/{user}', [UserController::class, 'update'])->name('updateUser');
    Route::delete('/delete/{user}', [UserController::class, 'destroy'])->name('deleteUser');
    Route::put('/updateProductProfile/{product}', [ProductController::class, 'update'])->name('updateProductProfile');
    Route::get('/admin/updateProductProfile/{product}', [ProductController::class, 'edit'])->name('editProductProfile');
    Route::delete('/delete-product/{product}', [ProductController::class, 'destroy'])->name('deleteProduct');
    Route::get('/sales', [TransactionController::class, 'sales'])->name('sales');
    Route::get('/relatorioVendas', [TransactionController::class, 'salesPdf'])->name('relatorioVendas');
});

Route::post('/store', [UserController::class, 'registerUser'])->name('registerProfile');












require __DIR__ . '/auth.php';
