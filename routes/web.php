<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai');
Route::get('/createpegawai', [EmployeeController::class, 'createpegawai'])->name('createpegawai');
Route::post('/insertpegawai', [EmployeeController::class, 'insertpegawai'])->name('insertpegawai');
Route::get('tampilpegawai/{id}', [EmployeeController::class, 'tampilpegawai'])->name('tampilpegawai');
Route::post('/updatepegawai/{id}', [EmployeeController::class, 'updatepegawai'])->name('updatepegawai');
Route::get('/deletepegawai/{id}', [EmployeeController::class, 'deletepegawai'])->name('deletepegawai');
// Route::get('/pegawai', 'EmployeeController@index')->name('pegawai');

//ExportPDF
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');