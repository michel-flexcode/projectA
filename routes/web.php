<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\SidebarpagesController;
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
    // Route::view('/sidebarpages/companies', 'sidebarpages.companies')->name('sidebarpages.companies');
    Route::get('/sidebarpages/vulnerabilities', [SidebarpagesController::class, 'vulnerabilities'])->name('sidebarpages.vulnerabilities');
    // Route::view('/sidebarpages/clients', 'sidebarpages.clients')->name('sidebarpages.clients');
});

require __DIR__ . '/auth.php';
