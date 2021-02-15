<?php

use App\Http\Controllers\{AuthController, DashboardController, EditController, ImportExportController, InputController, TampilDataController, UserManagementController};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Auth::routes();

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::group(['middleware' => ['auth', 'checkRole:super_admin']], function () {
    // profile user
    Route::get('/{id}/my_profile', [AuthController::class, 'my_profile'])->name('my_profile');
    Route::get('/{id}/edit_profile', [AuthController::class, 'edit_profile']);
    Route::put('/{id}/edit_profile/update_profile', [AuthController::class, 'update_profile']);

    // tampil data & detail
    Route::get('/dashboard/data_jamaah', [TampilDataController::class, 'tampil_data']);
    Route::get('/dashboard/{id}/detail', [TampilDataController::class, 'detail_data'])->name('detail.jamaah');


    // Delete
    Route::delete('/dashboard/data_jamaah/{id}', [TampilDataController::class, 'delete_data']);
    Route::get('/dashboard/{id}/delete', [TampilDataController::class, 'delete_data']);

    // EditController
    // update data pribadi
    Route::get('/dashboard/{id}/data_jamaah/personal_edit', [EditController::class, 'edit_data_pribadi']);
    Route::put('/dashboard/{id}/update_personal', [EditController::class, 'edit_data_pribadi_action']);

    // update data jamaah
    Route::get('/dashboard/{id}/data_jamaah/data_jamaah_edit', [EditController::class, 'edit_data_jamaah']);
    Route::put('/dashboard/{id}/update_jamaah', [EditController::class, 'edit_data_jamaah_action']);

    // update data jamaah
    Route::get('/dashboard/{id}/data_jamaah/alamat_edit', [EditController::class, 'edit_alamat']);
    Route::put('/dashboard/{id}/update_alamat', [EditController::class, 'edit_alamat_action']);

    // edit/upload avatar/foto_ktp/foto_passport
     // avatar
    Route::get('/dashboard/{id}/data_jamaah/upload_avatar', [EditController::class, 'avatar']);
    Route::put('/dashboard/{id}/data_jamaah/upload_avatar_action', [EditController::class, 'upload_avatar']);

    // Foto Ktp
    Route::get('/dashboard/{id}/data_jamaah/upload_foto_ktp', [EditController::class, 'foto_ktp']);
    Route::put('/dashboard/{id}/data_jamaah/upload_foto_ktp_action', [EditController::class, 'upload_foto_ktp']);

    // Foto Passport
    Route::get('/dashboard/{id}/data_jamaah/upload_foto_passport', [EditController::class, 'foto_passport']);
    Route::put('/dashboard/{id}/data_jamaah/upload_foto_passport_action', [EditController::class, 'upload_foto_passport']);

    // input
    Route::get('/dashboard/input', [InputController::class, 'input']);
    Route::post('/dashboard/input/go', [InputController::class, 'input_go']);

    // import Data
    Route::get('/dashboard/import', [ImportExportController::class, 'import_data']);
    Route::get('/dashboard/import/download', [ImportExportController::class, 'download_data'])->name('downloadsample');
    Route::post('/dashboard/import/go', [ImportExportController::class, 'store'])->name('store.import');


    // Export data
    Route::get('/dashboard/export', [ImportExportController::class, 'show_export']);
    Route::get('/dashboard/export/go', [ImportExportController::class, 'export'])->name('exportgo');

    // User Management
    // tampil user
    Route::get('/user/user_management', [UserManagementController::class, 'tampil_data']);
    // tambah user
    Route::get('/user/user_management/tambah', [UserManagementController::class, 'tambah']);
    Route::post('/user/user_management/tambah/go', [UserManagementController::class, 'tambah_go']);
});

Route::middleware('auth')->group(function(){
        Route::get('/dashboard', [DashboardController::class, 'index']);

        // profile user
        Route::get('/{id}/my_profile', [AuthController::class, 'my_profile'])->name('my_profile');
        Route::get('/{id}/edit_profile', [AuthController::class, 'edit_profile']);
        Route::put('/{id}/edit_profile/update_profile', [AuthController::class, 'update_profile']);

        // tampil data & detail
        Route::get('/dashboard/data_jamaah', [TampilDataController::class, 'tampil_data']);
        Route::get('/dashboard/{id}/detail', [TampilDataController::class, 'detail_data'])->name('detail.jamaah');

        // EditController
        // update data pribadi
        Route::get('/dashboard/{id}/data_jamaah/personal_edit', [EditController::class, 'edit_data_pribadi']);
        Route::put('/dashboard/{id}/update_personal', [EditController::class, 'edit_data_pribadi_action']);

        // edit/upload avatar/foto_ktp/foto_passport
        // avatar
        Route::get('/dashboard/{id}/data_jamaah/upload_avatar', [EditController::class, 'avatar']);
        Route::put('/dashboard/{id}/data_jamaah/upload_avatar_action', [EditController::class, 'upload_avatar']);

        // Foto Ktp
        Route::get('/dashboard/{id}/data_jamaah/upload_foto_ktp', [EditController::class, 'foto_ktp']);
        Route::put('/dashboard/{id}/data_jamaah/upload_foto_ktp_action', [EditController::class, 'upload_foto_ktp']);

        // Foto Passport
        Route::get('/dashboard/{id}/data_jamaah/upload_foto_passport', [EditController::class, 'foto_passport']);
        Route::put('/dashboard/{id}/data_jamaah/upload_foto_passport_action', [EditController::class, 'upload_foto_passport']);


        // input
        Route::get('/dashboard/input', [InputController::class, 'input']);
        Route::post('/dashboard/input/go', [InputController::class, 'input_go']);

        // import Data
        Route::get('/dashboard/import', [ImportExportController::class, 'import_data']);
        Route::get('/dashboard/import/download', [ImportExportController::class, 'download_data'])->name('downloadsample');
        Route::post('/dashboard/import/go', [ImportExportController::class, 'store'])->name('store.import');
});












