<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/dashboard/data_jamaah', [DashboardController::class, 'tampil_data']);
// Route::get('/dashboard/data_jamaah/cari', [DashboardController::class, 'cari_data']);
Route::get('/dashboard/{id}/detail', [DashboardController::class, 'detail_data']);

// update data
Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit_data']);
Route::post('/dashboard/{id}/update_data', [DashboardController::class, 'update_data']);

Route::delete('/dashboard/data_jamaah/{id}', [DashboardController::class, 'delete_data']);

Route::get('/dashboard/{id}/delete', [DashboardController::class, 'delete_data']);
Route::get('/dashboard/import/download', [DashboardController::class, 'download_data'])->name('downloadsample');
Route::get('/dashboard/import', [DashboardController::class, 'import_data']);
Route::post('/dashboard/import', [DashboardController::class, 'import_data_go']);


// Route::get('/dashboard/import/go', [DashboardController::class, 'import_data_go'])->name=('importdata');

// Route::post('/dashboard/import/go', [DashboardController::class, 'import_data_go']);
