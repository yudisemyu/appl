<?php

use App\Http\Controllers\LlamaController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExperienceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
Route::get('/sertifikat', [SertifikatController::class, 'index'])->name('sertifikat.index');
Route::get('/cv', [CvController::class, 'index'])->name('cv.show')->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile/view', [ProfileController::class, 'profile'])->name('profile.profile');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name( 'profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::resource('skills', SkillController::class);
    Route::resource('sertifikat', SertifikatController::class);
    Route::post('/ask-llama', [LlamaController::class, 'ask'])->name('llama.ask');
    Route::post('/ask-llama-web', [LlamaController::class, 'askWeb'])->name('llama.ask.web');
    Route::post('/cv/download', [CvController::class, 'download'])->name('cv.download');
    Route::resource('experiences', ExperienceController::class);
});

require __DIR__.'/auth.php';
