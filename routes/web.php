<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConfirmAccountController;
use App\Http\Controllers\EmployeeJob;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HumanResourcesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::get('/', function () {
    return view('welcome');
});
    Route::get('/confirm-account/{token}', [ConfirmAccountController::class, 'confirmAccount'])->name('confirm-account');
    Route::post('/confirm-account', [ConfirmAccountController::class, 'confirmAccountSubmit'])->name('confirm-account-submit');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        if(auth()->user()->role === 'company'){
            return redirect()->route('company.dashboard');
        } elseif (auth()->user()->role === 'human-resources') {
            return redirect()->route('human-resources.dashboard');
        }
    })->name('dashboard');

    Route::get('/company/home', [CompanyController::class, 'home'])->name('company.dashboard');
    Route::get('/company/job/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/company/job/store', [JobController::class, 'store'])->name('job.store');
    Route::get('/company/job/list', [JobController::class, 'list'])->name('job.list');
    Route::get('/company/job/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
    Route::post('/company/job/update', [JobController::class, 'update'])->name('job.update');

    Route::get('/company/human-resources/create', [HumanResourcesController::class, 'create'])->name('human-resources.create');
    Route::post('/company/human-resources/store', [HumanResourcesController::class, 'store'])->name('human-resources.store');
    Route::get('/company/human-resources/list', [HumanResourcesController::class, 'list'])->name('human-resources.list');
    Route::get('/company/human-resources/home', [HumanResourcesController::class, 'home'])->name('human-resources.dashboard');
    Route::post('/company/human-resources/{id}/handle-status', [HumanResourcesController::class, 'handleStatus'])->name('human-resources.handle-status');

    Route::get('/jobs/{job_id}/candidates', [EmployeeJob::class, 'show'])->name('candidates.show');
    Route::post('/jobs/{job_id}/download/cv', [EmployeeJob::class, 'download'])->name('candidates.downloadSelected');

    Route::get('/cities/{state_id}', function ($state_id) {
        return \App\Models\City::where('state_id', $state_id)->get();
    })->name('cities.byState');
});

require __DIR__ . '/auth.php';
