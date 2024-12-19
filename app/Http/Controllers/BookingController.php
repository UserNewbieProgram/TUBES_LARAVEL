<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // Menampilkan form pengajuan
    public function create()
    {
        return view('mahasiswa/form_pengajuan');
    }

    // Menyimpan data pengajuan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'nama_ruangan' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'tujuan' => 'required|string',
            'organisasi' => 'required|string|max:255'
        ]);

        Booking::create($request->all());

        return redirect()->route('riwayat.index')->with('success', 'Pengajuan berhasil dikirim!');
    }

    // Menampilkan riwayat pengajuan
    public function index()
    {
        $riwayat = Booking::orderBy('created_at', 'desc')->paginate(10);
        return view('mahasiswa/riwayat_mhs', compact('riwayat'));
    }
}
