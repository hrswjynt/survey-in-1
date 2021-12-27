<?php

use App\Http\Controllers\AdminController;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});
//beranda
Route::get('/beranda', [AdminController::class, 'beranda']);
// Halaman Surveyor Admin
// Route::resource('/surveyor/hapus', AdminController::class);
Route::get('/surveyor/{model}/hapus/{id}', [AdminController::class, 'destroy']);
Route::get('/surveyor', [AdminController::class, 'surveyor']);
Route::get('/surveyor/tambah', function () {
    $data = [
        'title' => 'Surveyor - Tambah Surveyor',
        'kabupaten' => Kabupaten::all('id', 'nama')
    ];
    return view('admin.surveyor.tambah', $data);
});
Route::post('/surveyor/tambah', [AdminController::class, 'tambahSurveyor']);
Route::post('/surveyor/edit/', [AdminController::class, 'updateSurveyor']);
Route::get('/surveyor/edit/{id}', [AdminController::class, 'getSurveyor']);
Route::get('/surveyor/profile/{id}', [AdminController::class, 'surveyorProfile']);
Route::get('/surveyor/target/{id}', [AdminController::class, 'showSurveyorTarget']);
Route::post('/surveyor/target/{id}', [AdminController::class, 'addSurveyorTarget']);
Route::get('/surveyor/riwayat/{id}', [AdminController::class, 'riwayat']);


// Profile Admin
Route::get('/profile/{User:id}', [AdminController::class, 'profile']);
Route::get('/profile', [AdminController::class, 'profile']);
Route::get('/profile/edit-profile/admin', function () {
    return view('admin.edit-profile', [
        'title' => 'Profile-Edit'
    ]);
});

// Halaman Pengaturan Admin
Route::get('/pengaturan', [AdminController::class, 'pengaturan']);
Route::get('/pengaturan/edit-data-survey', [AdminController::class, 'editDataSurvey']);
Route::post('/pengaturan/edit-data-survey/{model}/tambah', [AdminController::class, 'createData']);
Route::get('/pengaturan/edit-data-survey/{model}/hapus/{id}', [AdminController::class, 'destroy']);
Route::get('/pengaturan/ubah-password', [AdminController::class, 'ubahPassword']);
