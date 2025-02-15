<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTourism extends Model
{
    use HasFactory;

    protected $table = 'category_tourisms';
    protected $fillable = ['tourism_name'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
