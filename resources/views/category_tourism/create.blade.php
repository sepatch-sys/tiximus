@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Add Tourist Category</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
            <form action="{{ route('category_tourism.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Category Name</label>
                    <input type="text" name="tourism_name" class="w-full border rounded-lg p-2" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add</button>
                <a href="{{ route('category_tourism.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Back</a>
            </form>
        </div>
    </div>
@endsection
