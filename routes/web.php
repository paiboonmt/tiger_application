<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RattachaiController;
use App\Http\Controllers\SponserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TigerController;
use App\Http\Controllers\NukzuController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    // DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // RattachaiController
    Route::middleware('admin')->group(function () {

        Route::get('/tiger', [TigerController::class, 'index'])->name('tiger.index');
        Route::get('/nukzu', [NukzuController::class, 'index'])->name('nukzu.index');
        Route::get('/rattachai', [RattachaiController::class, 'index'])->name('rattachai.index');
        // users.index
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('users/edit/{id}', [UserController::class, 'show'])->name('users.edit');
        Route::post('users/update/{id}', [UserController::class, 'update'])->name('users.update');
    });

    // Nationality
    Route::get('/nationality',[NationalityController::class , 'index'])->name('nationality.index');
    Route::get('/nationality/create',[NationalityController::class , 'create'])->name('nationality.create');
    Route::post('/nationality/store',[NationalityController::class , 'store'])->name('nationality.store');
    Route::get('/nationality/edit/{id}',[NationalityController::class , 'edit'])->name('nationality.edit');
    Route::post('/nationality/update/{id}',[NationalityController::class , 'update'])->name('nationality.update');
    Route::post('/nationality/delete/{id}',[NationalityController::class , 'destroy'])->name('nationality.delete');

    // product
    Route::get('/product',[ProductsController::class , 'index'])->name('product.index');
    Route::get('/product/create',[ProductsController::class , 'create'])->name('product.create');
    Route::post('/product/store',[ProductsController::class , 'store'])->name('product.store');
    Route::get('/product/edit/{id}',[ProductsController::class , 'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductsController::class , 'update'])->name('product.update');
    Route::get('/product/delete/{id}',[ProductsController::class , 'destroy'])->name('product.delete');

    // CustomerController
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/expired', [CustomerController::class, 'expired'])->name('customers.expired');
    Route::get('customers/profile/{id}', [CustomerController::class, 'profile'])->name('customers.profile');
    // SponserController
    Route::get('sponsers', [SponserController::class, 'index'])->name('sponsers.index');
    Route::get('sponsers/expired', [SponserController::class, 'expired'])->name('sponsers.expired');
    Route::get('sponsers/profile/{id}', [SponserController::class, 'profile'])->name('sponsers.profile');
    // ReportController
    Route::get('report/checkin', [ReportController::class, 'checkin'])->name('report.checkin');
    // Search check-in report
    Route::post('report/checkin', [ReportController::class, 'searchCheckin'])->name('report.checkin.search');
    Route::get('report/customer-total', [ReportController::class, 'customerTotal'])->name('report.customerTotal');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
