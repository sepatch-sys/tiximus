<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTourism extends Model
{
    use HasFactory;

    protected $table = 'category_tourisms'; // Pastikan nama tabel sesuai dengan migrasi
    protected $fillable = ['category_name']; // Sesuaikan dengan kolom dalam tabel
}
