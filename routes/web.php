<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        if(auth()->user()->role === 'company'){
            return redirect()->route('company.dashboard');
        }
    })->name('dashboard');

    Route::get('/company/home', [CompanyController::class, 'home'])->name('company.dashboard');
});

require __DIR__ . '/auth.php';
