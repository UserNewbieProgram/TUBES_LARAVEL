<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Building;

class BookingController extends Controller
{
    // Menampilkan form pengajuan
    public function create($room_id)
    {
        $room = Room::with('building')->findOrFail($room_id);
        return view('mahasiswa.form_pengajuan', compact('room'));
    }

    // Menyimpan data pengajuan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'room_id' => 'required|exists:rooms,id', // Tambahkan validasi room_id
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'tujuan' => 'required|string',
            'organisasi' => 'required|string|max:255'
        ]);

        try {
            Booking::create([
                'nama_pemesan' => $request->nama_pemesan,
                'no_hp' => $request->no_hp,
                'room_id' => $request->room_id,
                'tgl_mulai' => $request->tgl_mulai,
                'tgl_selesai' => $request->tgl_selesai,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'tujuan' => $request->tujuan,
                'organisasi' => $request->organisasi
            ]);

            return redirect()->route('riwayat.index')->with('success', 'Pengajuan berhasil dikirim!');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Menampilkan riwayat pengajuan
    public function index()
    {
        $riwayat = Booking::orderBy('created_at', 'desc')->paginate(10);
        return view('mahasiswa/riwayat_mhs', compact('riwayat'));
    }

    // Menampilkan daftar booking untuk admin
    public function adminIndex()
    {

        $buildings = Building::all();

        $bookings = Booking::with('room')
                          ->where('status', 'Pending')
                          ->orderBy('created_at', 'desc')
                          ->get();
        return view('admin.index_admin', compact('buildings', 'bookings'));
    }

    // Menampilkan riwayat booking untuk admin
    public function adminHistory()
    {
        $buildings = Building::all();

        $bookings = Booking::with('room')
                          ->whereIn('status', ['Disetujui', 'Ditolak'])
                          ->orderBy('updated_at', 'desc')
                          ->get();
        return view('admin.riwayat_admin', compact('buildings', 'bookings'));
    }

    // Menangani aksi approve/reject
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return response()->json([
            'success' => true,
            'message' => 'Status berhasil diperbarui'
        ]);
    }

}
