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

// 03/06
use App\Http\Controllers\ConsultantsController;

// 05/06/2024
use App\Http\Controllers\DashboardController;




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
    Route::prefix('vulnerabilities')->name('vulnerabilities.')->group(function () {
        Route::get('/', [VulnerabilityController::class, 'index'])->name('index');
        Route::get('/create', [VulnerabilityController::class, 'create'])->name('create');
        Route::post('/', [VulnerabilityController::class, 'store'])->name('store');
        Route::get('/{vulnerability}', [VulnerabilityController::class, 'show'])->name('show');
        Route::get('/{vulnerability}/edit', [VulnerabilityController::class, 'edit'])->name('edit');
        Route::put('/{vulnerability}', [VulnerabilityController::class, 'update'])->name('update');
        Route::delete('/{vulnerability}', [VulnerabilityController::class, 'destroy'])->name('destroy');
    });

    // Routes sidebarpages
    Route::prefix('sidebarpages')->name('sidebarpages.')->group(function () {
        Route::get('/reports', [SidebarpagesController::class, 'reports'])->name('reports');
        Route::get('/vulnerabilities', [SidebarpagesController::class, 'vulnerabilities'])->name('vulnerabilities');
        Route::get('/companies', [CompaniesController::class, 'index'])->name('companies');
        Route::get('/consultants', [SidebarpagesController::class, 'consultants'])->name('consultants');
    });


    //search non fonctionnel
    // Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/search', [SearchController::class, 'index'])->name('search');


    //Ici, cette route n'est peut être pas adaptée à la page sidebar
    Route::post('/sidebarpages/companies', [CompaniesController::class, 'store'])->name('company.store');

    //ROUTE DE LA NABIGATION
    Route::post('/reports', [ReportsController::class, 'store'])->name('reports.store');
    Route::get('/reports/create', [ReportsController::class, 'create'])->name('reports.create');

    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');

    // 03/06/2024 worker
    Route::prefix('consultants')->name('consultants.')->group(function () {
        Route::get('/', [ConsultantsController::class, 'index'])->name('index');
        Route::get('/create', [ConsultantsController::class, 'create'])->name('create');
        Route::post('/', [ConsultantsController::class, 'store'])->name('store');
        Route::get('/{consultant}', [ConsultantsController::class, 'show'])->name('show');
        Route::get('/{consultant}/edit', [ConsultantsController::class, 'edit'])->name('edit');
        Route::put('/{consultant}', [ConsultantsController::class, 'update'])->name('update');
        Route::delete('/{consultant}', [ConsultantsController::class, 'destroy'])->name('destroy');
        Route::get('/delete', [ConsultantsController::class, 'delete'])->name('delete');
    });

    // bizarre
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
