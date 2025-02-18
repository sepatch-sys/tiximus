<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['category_province_id', 'category_tourism_id', 'name', 'price', 'description', 'ticket_date'];

    public function categoryProvince()
    {
        return $this->belongsTo(CategoryProvince::class, 'category_province_id');
    }

    public function categoryTourism()
    {
        return $this->belongsTo(CategoryTourism::class, 'category_tourism_id');
    }

    public function images()
    {
        return $this->hasMany(TourismImage::class);
    }
}
