@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Tourist Categories</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
            <h3 class="text-xl font-semibold mb-3">Tourist Category List</h3>

            <!-- Search Form -->
            <form method="GET" action="{{ route('category_tourism.index') }}" class="mb-4 flex">
                <input type="text" name="search" placeholder="Search category..." class="border p-2 rounded w-full" value="{{ request('search') }}">
                <button type="submit" class="ml-2 bg-blue-500 text-white p-2 rounded">Search</button>
            </form>

            <ul class="list-disc pl-6 mb-4">
                @foreach ($categories as $category)
                    <li class="flex justify-between items-center border-b py-2">
                        <span>{{ $category->category_name }}</span>
                        <form action="{{ route('category_tourism.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
