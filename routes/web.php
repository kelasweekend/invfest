<?php

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

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('daftar', [App\Http\Controllers\IndexController::class, 'daftar'])->name('daftar');
Route::post('daftar', [App\Http\Controllers\IndexController::class, 'store'])->name('index.kirim');

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::resource('kategori', KategoriController::class);
        // pendaftaran
        Route::get('pendaftaran', [App\Http\Controllers\Lomba\PendaftaranController::class, 'index'])->name('pendaftaran.index');
        Route::post('pendaftaran', [App\Http\Controllers\Lomba\PendaftaranController::class, 'store'])->name('pendaftaran.store');
        Route::get('pendaftaran/{invoice}', [App\Http\Controllers\Lomba\PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
        // setting 
        Route::resource('pembayaran', PembayaranController::class);
        Route::resource('timeline', TimelineController::class);
        Route::resource('sponsor', SponsorController::class);
        Route::resource('medpart', MediapartnerController::class);
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
