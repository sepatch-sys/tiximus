<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['category_provinces_id', 'category_tourisms_id', 'name', 'price', 'description'];

    public function categoryProvince()
    {
        return $this->belongsTo(CategoryProvince::class, 'category_province_id');
    }

    public function categoryTourism()
    {
        return $this->belongsTo(CategoryTourism::class, 'category_tourism_id');
    }
}
