<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

// Route untuk form pengajuan
Route::get('mahasiswa/form_pengajuan/{room_id}', [BookingController::class, 'create'])->name('form.create');
Route::post('mahasiswa/form_pengajuan', [BookingController::class, 'store'])->name('form.store');

// Route untuk riwayat peminjaman
Route::get('mahasiswa/riwayat_mhs', [BookingController::class, 'index'])->name('riwayat.index');


use App\Http\Controllers\RoomController;

Route::get('/room/create', [RoomController::class, 'input'])->name('admin.create_room');

Route::post('/room/store', [RoomController::class, 'store'])->name('admin.store_room');

Route::get('/room/display', [RoomController::class, 'display'])->name('admin.display_room');

Route::get('/room/{id}/edit', [RoomController::class, 'edit'])->name('admin.edit_room');

Route::put('/room/{id}', [RoomController::class, 'update'])->name('admin.update_room');

Route::delete('/room/{id}', [RoomController::class, 'destroy'])->name('admin.delete_room');

// Route untuk menampilkan daftar ruangan per gedung
Route::get('/building/{building_id}/rooms', [RoomController::class, 'showRoomsByBuilding'])->name('building.rooms');


Route::get('/admin/profile', function () {
    return view('profil_admin');
})->name('admin.profile');

Route::get('/admin/login', function () {
    return view('admin.login_admin');
})->name('admin.login');

Route::get('/admin/riwayat', function () {
    return view('admin.riwayat_admin');
})->name('admin.riwayat');

Route::get('/mahasiswa/login', function () {
    return view('mahasiswa.login_mhs');
})->name('mahasiswa.login');



// pakai BuildingController
use App\Http\Controllers\BuildingController;
Route::get('/admin/index_admin', [BookingController::class, 'adminIndex'])->name('admin.index_admin');
Route::get('/admin/riwayat', [BuildingController::class, 'riwayat'])->name('admin.riwayat');
Route::get('/mahasiswa/index_mhs', [BuildingController::class, 'indexMahasiswa'])->name('mahasiswa.index_mhs');
Route::get('/admin/form_gedung', [BuildingController::class, 'create'])->name('admin.form_gedung');
Route::post('/building/store', [BuildingController::class, 'store'])->name('admin.store_gedung');
Route::get('/admin/{id}/edit_gedung', [BuildingController::class, 'edit'])->name('admin.edit_gedung');
Route::put('/admin/{id}/update_gedung', [BuildingController::class, 'updateGedung'])->name('admin.update_gedung');
Route::delete('/admin/{id}/hapus_gedung', [BuildingController::class, 'destroy'])->name('admin.destroy_gedung');
Route::get('/admin/{id}/hapus_gedung', [BuildingController::class, 'hapusGedung'])->name('admin.hapus_gedung');

use App\Http\Controllers\UserController;
Route::get('/admin/form_user', [UserController::class, 'create'])->name('admin.form_user');
Route::post('/user/store', [UserController::class, 'store'])->name('admin.store_user');
Route::get('/admin/{id}/edit_user', [UserController::class, 'edit'])->name('admin.edit_user');
Route::put('/admin/{id}/update_user', [UserController::class, 'updateUser'])->name('admin.update_user');
Route::delete('/admin/{id}/hapus_user', [UserController::class, 'destroy'])->name('admin.destroy_user');
Route::get('/admin/{id}/hapus_user', [UserController::class, 'hapusUser'])->name('admin.hapus_user');
Route::post('/admin/login', [UserController::class, 'loginAdminSubmit'])->name('admin.login.submit');
Route::post('/mahasiswa/login', [UserController::class, 'loginMahasiswaSubmit'])->name('mahasiswa.login.submit');


Route::get('/admin/bookings', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
Route::get('/admin/bookings/history', [BookingController::class, 'adminHistory'])->name('admin.bookings.history');
Route::post('/admin/bookings/{id}/update-status', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');
