<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriProvinsi extends Model
{
    use HasFactory;

    protected $table = 'kategori_provinsis'; // Pastikan ini sesuai dengan nama tabel di database

    protected $fillable = ['nama_provinsi']; // Izinkan mass assignment
}
