<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProgressReportController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        return match ($role) {
            'admin' => view('dashboard.admin.index'),
            'contractor' => view('dashboard.contractor.index'),
            'client' => view('dashboard.client.index'),
            default => abort(403),
        };
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('projects', ProjectController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('progress-reports', ProgressReportController::class)->except(['show']);
});

Route::patch('/progress-reports/{report}/approve', [ProgressReportController::class, 'approve'])
    ->middleware(['auth'])
    ->name('progress-reports.approve');

Route::patch('/progress-reports/{report}/reject', [ProgressReportController::class, 'reject'])
    ->middleware(['auth'])
    ->name('progress-reports.reject');

