<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'nama_pemesan',
        'no_hp',
        'nama_ruangan',
        'tgl_mulai',
        'tgl_selesai',
        'jam_mulai',
        'jam_selesai',
        'tujuan',
        'organisasi',
        'status'
    ];
}
