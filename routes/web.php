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
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;
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

        Route::controller(UserController::class)->group(function () {
            Route::get('users', 'index')->name('users.index');
            Route::get('users/create', 'create')->name('users.create');
            Route::post('users/store', 'store')->name('users.store');
            Route::get('users/edit/{id}', 'show')->name('users.edit');
            Route::post('users/update/{id}', 'update')->name('users.update');
        });
        Route::controller(PaymentController::class)->group(function () {
            Route::get('/payment', 'index')->name('payment.index');
            Route::get('/payment/create', 'create')->name('payment.create');
            Route::post('/payment/store', 'store')->name('payment.store');
            Route::get('/payment/edit/{id}', 'edit')->name('payment.edit');
            Route::post('/payment/update/{id}', 'update')->name('payment.update');
            Route::post('/payment/delete/{id}', 'destroy')->name('payment.destroy');
        });
        Route::controller(RoleController::class)->group(function () {
            Route::get('/roles', 'index')->name('roles.index');
            Route::get('/roles/create', 'create')->name('roles.create');
            Route::post('/roles/store', 'store')->name('roles.store');
            Route::get('/roles/edit/{id}', 'edit')->name('roles.edit');
            Route::post('/roles/update/{id}', 'update')->name('roles.update');
            Route::post('/roles/delete/{id}', 'destroy')->name('roles.destroy');
        });

        // Nationality
        Route::controller(NationalityController::class)->group(function () {
            Route::get('/nationality', [NationalityController::class, 'index'])->name('nationality.index');
            Route::get('/nationality/create', [NationalityController::class, 'create'])->name('nationality.create');
            Route::post('/nationality/store', [NationalityController::class, 'store'])->name('nationality.store');
            Route::get('/nationality/edit/{id}', [NationalityController::class, 'edit'])->name('nationality.edit');
            Route::post('/nationality/update/{id}', [NationalityController::class, 'update'])->name('nationality.update');
            Route::post('/nationality/delete/{id}', [NationalityController::class, 'destroy'])->name('nationality.delete');
        });

        // ProductController
        Route::controller(ProductsController::class)->group(function () {
            Route::get('/product', 'index')->name('product.index');
            Route::get('/product/create', 'create')->name('product.create');
            Route::post('/product/store', 'store')->name('product.store');
            Route::get('/product/edit/{id}', 'edit')->name('product.edit');
            Route::post('/product/update/{id}', 'update')->name('product.update');
            Route::post('/product/delete/{id}', 'destroy')->name('product.delete');
        });

    });
    
    // CustomerController
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'index')->name('customers.index');
        Route::get('/customers/expired', 'expired')->name('customers.expired');
        Route::get('/customers/profile/{id}', 'profile')->name('customers.profile');
    });
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
