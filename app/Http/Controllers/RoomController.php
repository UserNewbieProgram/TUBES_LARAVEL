<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{

    //Menampilkan halaman form input room
    public function input()
    {
        return view('admin.form_ruang');
    }

    //Menambahkan room baru
    public function store(Request $request)
    {
        \Log::info('Masuk ke store() method.');

        $request->validate([
            'building' => 'required|string|max:255',
            'floor' => 'required|integer',
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'facilities' => 'required|array',
            'photo_url' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        \Log::info('Validasi berhasil.');

        if ($request->hasFile('photo_url')) {
            $filePath = $request->file('photo_url')->store('uploads/rooms', 'public');
            \Log::info('File berhasil diupload: ' . $filePath);
        } else {
            \Log::info('File tidak ditemukan.');
        }

        Room::create([
            'building' => $request->input('building'),
            'floor' => $request->input('floor'),
            'name' => $request->input('name'),
            'capacity' => $request->input('capacity'),
            'facilities' => json_encode($request->input('facilities')),
            'photo_url' => $filePath ?? '',
        ]);

        \Log::info('Data berhasil disimpan ke database.');

        return redirect()->route('admin.create_room')->with('success', 'Data berhasil ditambahkan.');
    }


    //Menampilkan semua room
    public function display()
    {
        $rooms = Room::all();
        return view('admin.edit_ruang', compact('rooms'));
    }

}
