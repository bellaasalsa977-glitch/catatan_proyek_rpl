<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    // Tambahkan baris ini di bawah ya!
    protected $table = 'proyeks';

    protected $fillable = [
        'user_id',
        'nama_proyek',
        'jenis_proyek',
        'teknologi',
        'deskripsi',
        'status_proyek',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}