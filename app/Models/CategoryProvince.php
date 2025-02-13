<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProvince extends Model
{
    use HasFactory;

    protected $table = 'category_provinces';

    protected $fillable = ['province_name', 'province_image'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
