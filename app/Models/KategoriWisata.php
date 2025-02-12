<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriWisata extends Model
{
    use HasFactory;

    protected $table = 'kategori_wisatas'; // Pastikan nama tabel benar
    protected $fillable = ['nama_kategori']; // Pastikan kolom bisa diisi
}
