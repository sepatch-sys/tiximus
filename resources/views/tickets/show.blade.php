@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-4 text-indigo-700">{{ $ticket->name }}</h2>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <p class="text-gray-600 text-sm">Price</p>
            <p class="text-lg font-semibold text-gray-800">Rp {{ number_format($ticket->price, 2, ',', '.') }}</p>
        </div>
        <div>
            <p class="text-gray-600 text-sm">Date</p>
            <p class="text-lg font-semibold text-gray-800">{{ \Carbon\Carbon::parse($ticket->ticket_date)->format('d M Y') }}</p>
        </div>
    </div>

    <div class="mt-4">
        <p class="text-gray-600 text-sm">Description</p>
        <p class="text-gray-800">{{ $ticket->description ?? 'No description available.' }}</p>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('tickets.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">
            <i class="fas fa-arrow-left"></i> Back
        </a>

        <a href="{{ route('tickets.edit', $ticket->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
</div>
@endsection
