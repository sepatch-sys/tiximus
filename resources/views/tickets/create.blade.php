@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Add Ticket</h2>

    <form action="{{ route('tickets.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Ticket Name</label>
            <input type="text" name="name" id="name" 
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required value="{{ old('name') }}">
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input type="number" name="price" id="price" 
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                required value="{{ old('price') }}">
            @error('price')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="3"
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center space-x-2 mt-4">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                <i class="fas fa-save"></i> Save
            </button>
            <a href="{{ route('tickets.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </form>
</div>
@endsection
