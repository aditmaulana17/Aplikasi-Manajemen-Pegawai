<?php

use App\Http\Controllers\BagianController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\UserController;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pegawai', function(){
    return view('pegawai');
});

Route::fallback(function(){
    return view('404');
});

Route::resource('pegawai', PegawaiController::class);
Route::resource('users', UserController::class)->middleware('isSupervisor');
Route::post('user-update-role', [UserController::class,'updateRole'])->name('user.update-role');
Route::resource('bagian', BagianController::class);

// Route::get('/truncate', function (){
//     Pegawai::truncate();
// });

Route::resource('bagian', BagianController::class);

Route::middleware(['auth'])->group(function () {
    // Route Dashboard kamu yang sudah ada...
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Tambahkan 2 baris ini untuk Fitur Profil
  Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});