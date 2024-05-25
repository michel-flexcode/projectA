<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SidebarpagesController;

//Celui ci est plutôt pour le panneau interne
use App\Http\Controllers\CompaniesController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomepageController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/search', [SearchController::class, 'index'])->name('search');

    // Routes pour les vues dans le dossier sidebarpages
    Route::get('/sidebarpages/vulnerabilities', [SidebarpagesController::class, 'vulnerabilities'])->name('sidebarpages.vulnerabilities');
    Route::get('/sidebarpages/companies', [CompaniesController::class, 'index'])->name('sidebarpages.companies');
    Route::post('/sidebarpages/companies', [CompaniesController::class, 'store'])->name('company.store');

    Route::get('/sidebarpages/nist', [SidebarpagesController::class, 'nist'])->name('sidebarpages.nist');
    Route::get('/sidebarpages/reports', [SidebarpagesController::class, 'reports'])->name('sidebarpages.reports');

    // Route::view('/sidebarpages/clients', 'sidebarpages.clients')->name('sidebarpages.clients');
});

require __DIR__ . '/auth.php';
