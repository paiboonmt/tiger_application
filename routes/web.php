<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SponserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    
    // DashboardController
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


    // users.index
    Route::resource('users', App\Http\Controllers\UserController::class);

    // CustomerController
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/expired',[CustomerController::class, 'expired'])->name('customers.expired');
    Route::get('customers/profile/{id}',[CustomerController::class, 'profile'])->name('customers.profile');

    // SponserController
    Route::get('sponsers', [SponserController::class, 'index'])->name('sponsers.index');
    Route::get('sponsers/expired',[SponserController::class, 'expired'])->name('sponsers.expired');
    Route::get('sponsers/profile/{id}',[SponserController::class, 'profile'])->name('sponsers.profile');

    // ReportController
    Route::get('report/checkin', [ReportController::class, 'checkin'])->name('report.checkin');
    // Search check-in report
    Route::post('report/checkin', [ReportController::class, 'searchCheckin'])->name('report.checkin.search');
    Route::get('report/customer-total', [ReportController::class, 'customerTotal'])->name('report.customerTotal');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
