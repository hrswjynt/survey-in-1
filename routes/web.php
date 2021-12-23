<?php

use App\Http\Controllers\AdminController;
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
Route::resource('/surveyor/hapus', AdminController::class);
Route::get('/surveyor', [AdminController::class, 'surveyor']);
Route::get('/surveyor/tambah', function () {
    return view('/admin/surveyor/tambah');
});
Route::post('/surveyor/tambah', [AdminController::class, 'tambahSurveyor']);
Route::post('/surveyor/edit/', [AdminController::class, 'updateSurveyor']);
Route::get('/surveyor/edit/{id}', [AdminController::class, 'getSurveyor']);
Route::get('/surveyor/profile/{id}', [AdminController::class, 'surveyorProfile']);
Route::get('/surveyor/target/{id}', [AdminController::class, 'surveyorTarget']);


// Profile Admin
Route::get('/profile/{User:id}', [AdminController::class, 'profile']);
Route::get('/profile', [AdminController::class, 'profile']);

// Halaman Pengaturan Admin
Route::get('/pengaturan', [AdminController::class, 'pengaturan']);
Route::get('/pengaturan/edit-data-survey', [AdminController::class, 'editDataSurvey']);
Route::post('/pengaturan/edit-data-survey/jalan', [AdminController::class, 'tambahJenisJalan']);
Route::post('/pengaturan/edit-data-survey/saluran', [AdminController::class, 'tambahJenisSaluran']);
Route::post('/pengaturan/edit-data-survey/fasos', [AdminController::class, 'tambahJenisFasos']);
Route::post('/pengaturan/edit-data-survey/lampiran', [AdminController::class, 'tambahJenisLampiran']);
Route::get('/pengaturan/ubah-password', [AdminController::class, 'ubahPassword']);
