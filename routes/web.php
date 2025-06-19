<?php

use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profile', function () {
    return view('profile', ['user' => Auth::user()]);
})->middleware('auth')->name('profile');


Route::get('/profile', [ProfileController::class, 'profile'])->name('profile.show');



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::resource('skills', SkillController::class);
    Route::resource('sertifikats', SertifikatController::class);
});


require __DIR__.'/auth.php';
