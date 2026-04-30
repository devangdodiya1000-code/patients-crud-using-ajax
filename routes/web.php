<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\SubtypeController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // type
    Route::get('/types', [TypeController::class, 'index'])->name('types');
    Route::get('/types/get', [TypeController::class, 'get'])->name('types.get');
    Route::get('/types/create', [TypeController::class, 'create'])->name('types.create');
    Route::post('/types/store', [TypeController::class, 'store'])->name('types.store');
    Route::get('/types/edit/{id}', [TypeController::class, 'edit'])->name('types.edit');
    Route::get('/types/delete/{id}', [TypeController::class, 'destroy'])->name('types.destroy');

    //subtype
    Route::get('/subtypes', [SubtypeController::class, 'index'])->name('subtypes');
    Route::get('/subtypes/get', [SubtypeController::class, 'get'])->name('subtypes.get');
    Route::get('/subtypes/create', [SubtypeController::class, 'create'])->name('subtypes.create');
    Route::post('/subtypes/store', [SubtypeController::class, 'store'])->name('subtypes.store');
    Route::get('/subtypes/edit/{id}', [SubtypeController::class, 'edit'])->name('subtypes.edit');
    Route::get('/subtypes/delete/{id}', [SubtypeController::class, 'destroy'])->name('subtypes.destroy');

    //patients
    Route::get('/patients', [PatientController::class, 'index'])->name('patients');
    Route::get('/patients/get', [PatientController::class, 'get'])->name('patients.get');
    Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('/patients/store', [PatientController::class, 'store'])->name('patients.store');
});

require __DIR__.'/auth.php';
