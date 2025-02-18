<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismImage extends Model
{
    use HasFactory;
    protected $table = 'tourism_images';
    protected $fillable = ['ticket_id', 'image_path'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
