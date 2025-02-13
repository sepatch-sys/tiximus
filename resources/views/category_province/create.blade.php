@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Add Province Category</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <form action="{{ route('category_province.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Province Name</label>
                <input type="text" name="province_name" class="w-full border rounded-lg p-2" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</div>
@endsection
