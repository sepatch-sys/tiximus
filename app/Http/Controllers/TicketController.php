<?php

namespace App\Http\Controllers;

use App\Models\CategoryProvince;
use App\Models\CategoryTourism;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketScan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create()
    {
        $categoryProvinces = CategoryProvince::all();
        $categoryTourisms = CategoryTourism::all();

        return view('tickets.create', compact('categoryProvinces', 'categoryTourisms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_province_id' => 'required|exists:category_provinces,id',
            'category_tourism_id' => 'required|exists:category_tourisms,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'ticket_date' => 'required|date',
        ]);

        Ticket::create([
            'category_province_id' => $request->category_province_id,
            'category_tourism_id' => $request->category_tourism_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'ticket_date' => $request->ticket_date,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dibuat!');
    }

    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'ticket_date' => 'required|date',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
