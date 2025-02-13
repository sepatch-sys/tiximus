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

            <a href="{{ route('category_tourism.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-3 inline-block">
                + Add Category
            </a>

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
