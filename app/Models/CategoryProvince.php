<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProvince extends Model
{
    use HasFactory;

    protected $table = 'category_provinces';

    protected $fillable = ['province_name']; // Allow mass assignment
}
