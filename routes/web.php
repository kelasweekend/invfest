<?php

use App\Http\Controllers\Lomba\KaryaController;
use App\Http\Controllers\Lomba\KategoriController;
use App\Http\Controllers\Lomba\TimelineController;
use App\Http\Controllers\Setting\MediapartnerController;
use App\Http\Controllers\Setting\PembayaranController;
use App\Http\Controllers\Setting\SponsorController;
use App\Mail\Pendaftaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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

Route::middleware(['maintenance'])->group(function () {
    Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
    Route::get('upload-karya', [App\Http\Controllers\IndexController::class, 'karya'])->name('karya');
    Route::post('upload-karya', [App\Http\Controllers\IndexController::class, 'upload_karya'])->name('upload_karya');
    // sucess page
    Route::get('konfirmasi', [App\Http\Controllers\IndexController::class, 'sukses_daftar'])->name('sukses_daftar');
    Route::post('konfirmasi', [App\Http\Controllers\IndexController::class, 'konfirmasi'])->name('konfirmasi');
    Route::get('daftar', [App\Http\Controllers\IndexController::class, 'daftar'])->name('daftar');
    Route::post('daftar', [App\Http\Controllers\IndexController::class, 'store'])->name('index.kirim');
    Route::get('bayar/{invoice}', [App\Http\Controllers\IndexController::class, 'bayar'])->name('bayar');
    Route::get('track', [App\Http\Controllers\IndexController::class, 'track'])->name('track');
    Route::post('track', [App\Http\Controllers\IndexController::class, 'check'])->name('check_bayar');

    // terima kasih
    Route::get('terimakasih', [App\Http\Controllers\IndexController::class, 'terimakasih'])->name('terimakasih');
    Route::get('karya_terupload', [App\Http\Controllers\IndexController::class, 'karya_terupload'])->name('karya_terupload');
});
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::middleware(['auth', 'dontback'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::post('/', [App\Http\Controllers\HomeController::class, 'index_update'])->name('home.update');
        Route::resource('kategori', KategoriController::class);
        // pendaftaran
        Route::get('pendaftaran', [App\Http\Controllers\Lomba\PendaftaranController::class, 'index'])->name('pendaftaran.index');
        Route::post('pendaftaran', [App\Http\Controllers\Lomba\PendaftaranController::class, 'store'])->name('pendaftaran.store');
        Route::get('pendaftaran/{invoice}', [App\Http\Controllers\Lomba\PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
        Route::post('pendaftaran/{invoice}', [App\Http\Controllers\Lomba\PendaftaranController::class, 'update'])->name('pendaftaran.update');
        Route::delete('pendaftaran/{invoice}', [App\Http\Controllers\Lomba\PendaftaranController::class, 'destroy'])->name('pendaftaran.destroy');
        // setting 
        Route::resource('pembayaran', PembayaranController::class);
        Route::resource('timeline', TimelineController::class);
        Route::resource('sponsor', SponsorController::class);
        Route::resource('medpart', MediapartnerController::class);
        Route::resource('karya', KaryaController::class);
    });
});

Route::get('send', function () {

    $details = [
        'title' => 'Tester',
        'body' => 'This is for testing email using smtp'
    ];

    Mail::to('fauzantaqiyuddin123@gmail.com')->send(new Pendaftaran($details));
    dd("Email is Sent.");
});
