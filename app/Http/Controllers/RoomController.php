<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{

    //Menampilkan halaman form input room
    public function input()
    {
        $buildings = Building::all();
        return view('admin.form_ruang', compact('buildings'));
    }

    //Menambahkan room baru
    public function store(Request $request)
    {
        \Log::info('Masuk ke store() method.');

        $request->validate([
            'building_id' => 'required|exists:buildings,id',
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
            'building_id' => $request->input('building_id'),
            'floor' => $request->input('floor'),
            'name' => $request->input('name'),
            'capacity' => $request->input('capacity'),
            'facilities' => json_encode($request->input('facilities')),
            'photo_url' => $filePath ?? '',
        ]);

        \Log::info('Data berhasil disimpan ke database.');

        return redirect()->route('admin.create_room')->with('success', 'Ruang berhasil ditambahkan.');
    }


    //Menampilkan semua room
    public function display()
    {
        $rooms = Room::all();
        $buildings = Building::all();
        return view('admin.edit_ruang', compact('rooms', 'buildings'));
    }

    //Menampilkan halaman form edit room
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $buildings = Building::all();
        return view('admin.form_edit', compact('room', 'buildings'));
    }

    //Memperbarui room 
    public function update(Request $request, $id)
    {
        \Log::info('Masuk ke update() method.');

        $request->validate([
            'building_id' => 'required|exists:buildings,id',
            'floor' => 'required|integer',
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'facilities' => 'required|array',
        ]);

        $room = Room::findOrFail($id);

        $room->building_id = $request->building_id;
        $room->floor = $request->floor;
        $room->name = $request->name;
        $room->capacity = $request->capacity;
        $room->facilities = json_encode($request->facilities);
        
        if ($request->hasFile('photo_url')) {
            
            $request->validate([
                'photo_url' => 'image|mimes:jpg,jpeg,png|max:2048'
            ]);

            if ($room->photo_url) {
                Storage::disk('public')->delete($room->photo_url);
            }
            $filePath = $request->file('photo_url')->store('uploads/rooms', 'public');
            $room->photo_url = $filePath;
        }

        $room->save();
        return redirect()->route('admin.edit_room', $room->id)->with('success', 'Ruang berhasil diperbarui.');
    }

    //Menghapus room
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        if ($room->photo_url && Storage::disk('public')->exists($room->photo_url)) {
            Storage::disk('public')->delete($room->photo_url);
        }

        $room->delete();

        return redirect()->route('admin.display_room')->with('success', 'Ruang berhasil dihapus.');
    }

    //Menampilkan daftar ruang pada gedung
    public function showRoomsByBuilding($building_id)
    {
        $building = Building::findOrFail($building_id);
        $rooms = Room::where('building_id', $building_id)->get();
        return view('mahasiswa.daftarRuang_mhs', compact('rooms', 'building'));
    }

}
