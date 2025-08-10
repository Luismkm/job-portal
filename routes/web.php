<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
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
    Route::get('/company/job/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/company/job/store', [JobController::class, 'store'])->name('job.store');


    Route::get('/cities/{state_id}', function ($state_id) {
        return \App\Models\City::where('state_id', $state_id)->get();
    })->name('cities.byState');
});

require __DIR__ . '/auth.php';
