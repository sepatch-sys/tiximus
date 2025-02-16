<?php

namespace App\Http\Controllers;

use App\Models\CategoryProvince;
use Illuminate\Http\Request;
use App\Models\Ticket;

class HomeController extends Controller
{
    public function index()
    {
        $tickets = Ticket::inRandomOrder()->take(5)->get();
        $provinces = CategoryProvince::latest()->take(5)->get();

        // Pilih provinsi secara acak
        $randomProvince = $provinces->random();

        // Ambil tiket yang sesuai dengan provinsi terpilih dan batasi 5 tiket
        $provinceTickets = Ticket::where('category_province_id', $randomProvince->id)
            ->latest()
            ->take(4)
            ->get();

        return view('welcome', compact('tickets', 'provinces', 'randomProvince', 'provinceTickets'));
    }
}
