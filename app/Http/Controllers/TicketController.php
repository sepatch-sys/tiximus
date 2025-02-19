<?php

namespace App\Http\Controllers;

use App\Models\CategoryProvince;
use App\Models\CategoryTourism;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('images')->get();
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
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'ticket_date' => 'required|date',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $ticket = Ticket::create([
            'category_province_id' => $request->category_province_id,
            'category_tourism_id' => $request->category_tourism_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'ticket_date' => $request->ticket_date,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('ticket_images', 'public');
                $ticket->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dibuat!');
    }

    public function show(Ticket $ticket)
    {
        $ticket->load('images');
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
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'ticket_date' => 'required|date',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $ticket->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'ticket_date' => $request->ticket_date,
        ]);

        if ($request->has('deleted_images')) {
            foreach ($request->deleted_images as $imageId) {
                $image = $ticket->images()->findOrFail($imageId);
                Storage::disk('public')->delete($image->image_path);
                $image->delete();
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('ticket_images', 'public');
                $ticket->images()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    public function destroy(Ticket $ticket)
    {
        foreach ($ticket->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
