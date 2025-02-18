<?php

namespace App\Http\Controllers;

use App\Models\CategoryProvince;
use App\Models\CategoryTourism;
use Illuminate\Http\Request;
use App\Models\Ticket;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tickets = Ticket::with('images')
            ->when($request->has('category_tourism_id'), function ($query) use ($request) {
                $query->where('category_tourism_id', $request->category_tourism_id);
            })
            ->inRandomOrder()->take(5)->get();

        $provinces = CategoryProvince::latest()->take(5)->get();

        $randomProvince = null;
        $provinceTickets = collect();

        if ($provinces->isNotEmpty()) {
            $randomProvince = $provinces->random();

            $provinceTickets = Ticket::where('category_province_id', $randomProvince->id)
                ->latest()
                ->take(4)
                ->get();
        }

        $categories = CategoryTourism::all();

        return view('welcome', compact('tickets', 'provinces', 'randomProvince', 'provinceTickets', 'categories'));
    }

    // Fungsi untuk menampilkan halaman user-show-ticket
    public function userShowTicket($id)
    {
        // Ambil data tiket berdasarkan ID
        $ticket = Ticket::with('images')->findOrFail($id);

        // Kirim data tiket ke tampilan
        return view('show_ticket.show', compact('ticket'));
    }
}
