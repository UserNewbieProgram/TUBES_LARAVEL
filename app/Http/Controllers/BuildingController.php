<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function index()
    {
        $buildings = Building::all();
        return view('admin.index_admin', compact('buildings'));
    }
    // Menampilkan form tambah gedung
    public function create()
    {
        $building = Building::first();
        return view('admin.form_gedung', compact('building'));
    }

    // Menyimpan data gedung ke database
    public function store(Request $request)
    {
        $request->validate([
            'name_building' => 'required|string|max:255',
            'floor' => 'required|integer|min:1',
            'mapping' => 'required|url',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);        

        // Upload gambar
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('assets/img'), $filename);

        // Simpan data gedung
        Building::create([
            'name_building' => $request->name_building,
            'floor' => $request->floor,
            'mapping' => $request->mapping,
            'foto' => $filename,
        ]);

        return redirect()->route('mahasiswa.index_mhs')->with('success', 'Data Gedung berhasil ditambahkan!');
    }

    // Menampilkan semua data gedung di index mahasiswa
    public function indexMahasiswa()
    {
        $buildings = Building::all();
        return view('mahasiswa.index_mhs', compact('buildings'));
    }

    public function edit($id)
    {
        $building = Building::findOrFail($id);
        $allBuildings = Building::all();
        return view('admin.edit_gedung', compact('building', 'allBuildings'));
    }

    public function formGedung()
    {
        $building = Building::all(); // Atau sesuai kebutuhan Anda
        return view('admin.form_gedung', compact('building'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_building' => 'required|string|max:255',
            'floor' => 'required|integer|min:1',
            'mapping' => 'required|url',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $building = Building::findOrFail($id);

        // Periksa apakah ada gambar baru
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img'), $filename);

            // Hapus foto lama
            if ($building->foto && file_exists(public_path('assets/img/' . $building->foto))) {
                unlink(public_path('assets/img/' . $building->foto));
            }

            $building->foto = $filename;
        }

        // Update data lainnya
        $building->update([
            'name_building' => $request->name_building,
            'floor' => $request->floor,
            'mapping' => $request->mapping,
        ]);

        return redirect()->route('mahasiswa.index_mhs')->with('success', 'Data Gedung berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $building = Building::findOrFail($id);
        $building->delete();

        return redirect()->route('admin.index_admin')->with('success', 'Gedung berhasil dihapus');
    }

    public function hapusGedung($id)
    {
        $building = Building::findOrFail($id); // Mengambil data gedung berdasarkan ID
        $allBuildings = Building::all(); // Opsional, untuk menampilkan semua gedung
        return view('admin.hapus_gedung', compact('building', 'allBuildings'));
    }
}
