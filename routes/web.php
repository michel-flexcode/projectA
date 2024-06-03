<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SidebarpagesController;

//Celui ci est plutôt pour le panneau interne dédoublement de personnalité
use App\Http\Controllers\CompaniesController;
//Ici bouton de nav
use App\Http\Controllers\ReportsController;

//01/06/2024 vulnerabilites crud
use App\Http\Controllers\VulnerabilityController;



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
    //Route fonctionnelles
    // Routes pour les vues dans le dossier sidebarpages
    Route::get('/sidebarpages/nist', [SidebarpagesController::class, 'nist'])->name('sidebarpages.nist');
    Route::get('/sidebarpages/reports', [SidebarpagesController::class, 'reports'])->name('sidebarpages.reports');
    Route::get('/sidebarpages/vulnerabilities', [SidebarpagesController::class, 'vulnerabilities'])->name('sidebarpages.vulnerabilities');
    Route::get('/sidebarpages/companies', [CompaniesController::class, 'index'])->name('sidebarpages.companies');


    //search non fonctionnel
    // Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/search', [SearchController::class, 'index'])->name('search');


    //Ici, cette route n'est peut être pas adaptée à la page sidebar
    Route::post('/sidebarpages/companies', [CompaniesController::class, 'store'])->name('company.store');

    //ROUTE DE LA NABIGATION
    Route::post('/reports', [ReportsController::class, 'store'])->name('reports.store');
    Route::get('/reports/create', [ReportsController::class, 'create'])->name('reports.create');

    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');

    // 01/06/2024 Vulnerabilities crud test
    Route::prefix('vulnerabilities')->group(function () {
        Route::get('/', [VulnerabilityController::class, 'index'])->name('vulnerabilities.index');
        Route::get('/create', [VulnerabilityController::class, 'create'])->name('vulnerabilities.create');
        Route::post('/', [VulnerabilityController::class, 'store'])->name('vulnerabilities.store');
        Route::get('/{vulnerability}/edit', [VulnerabilityController::class, 'edit'])->name('vulnerabilities.edit');
        Route::put('/{vulnerability}', [VulnerabilityController::class, 'update'])->name('vulnerabilities.update');
        Route::delete('/{vulnerability}', [VulnerabilityController::class, 'destroy'])->name('vulnerabilities.destroy');
    });

    Route::get('/vulnerabilities/index', [VulnerabilityController::class, 'index'])->name('vulnerabilities.index');
    Route::get('/vulnerabilities/{vulnerability}', [VulnerabilityController::class, 'show'])->name('vulnerabilities.show');
    // 06/03/2024
    Route::post('/vulnerabilities', [VulnerabilityController::class, 'store'])->name('vulnerabilities.store');
});

require __DIR__ . '/auth.php';
