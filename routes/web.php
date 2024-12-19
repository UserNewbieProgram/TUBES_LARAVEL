<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// Route untuk form pengajuan
Route::get('mahasiswa/form_pengajuan', [BookingController::class, 'create'])->name('form.create');
Route::post('mahasiswa/form_pengajuan', [BookingController::class, 'store'])->name('form.store');

// Route untuk riwayat peminjaman
Route::get('mahasiswa/riwayat_mhs', [BookingController::class, 'index'])->name('riwayat.index');


use App\Http\Controllers\RoomController;

Route::get('/room/create', [RoomController::class, 'input'])->name('admin.create_room');

Route::post('/room/store', [RoomController::class, 'store'])->name('admin.store_room');

Route::get('/room/display', [RoomController::class, 'display'])->name('admin.display_room');

Route::get('/admin', function () {
    return view('index_admin');
})->name('admin.dashboard');

Route::get('/admin/profile', function () {
    return view('profil_admin');
})->name('admin.profile');

Route::get('/login', function () {
    return view('login_admin');
})->name('admin.logout');

Route::get('/riwayat', function () {
    return view('riwayat_admin');
})->name('admin.riwayat');



// pakai BuildingController
Route::get('/building/create', function () {
    return view('form_gedung');
})->name('admin.create_building');

Route::get('/building/edit', function () {
    return view('edit_gedung');
})->name('admin.edit_building');
