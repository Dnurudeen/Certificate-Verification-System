<?php

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/', function () {
        return view('/admin/dashboard');
    });
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/verified-credentials', [App\Http\Controllers\AdminController::class, 'verified_credentials'])->name('verified.credentials');
    Route::post('/admin/upload', [App\Http\Controllers\AdminController::class, 'uploadCertificate'])->name('admin.upload');
    Route::get('/admin/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.certificates.edit');
    Route::put('/admin/verified-credentials/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.certificates.update');
    Route::delete('/admin/verified-credentials/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.certificates.destroy');
});

Route::get('/verify', [App\Http\Controllers\CertificateController::class, 'showVerificationForm'])->name('verify.form');
Route::post('/verify', [App\Http\Controllers\CertificateController::class, 'verifyCertificate'])->name('verify');
Route::get('/download/{id}', [App\Http\Controllers\CertificateController::class, 'downloadCertificate'])->name('download.certificate');
