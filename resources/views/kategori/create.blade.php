@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Kategori Wisata</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
            <h3 class="text-xl font-semibold mb-3">Tambah Kategori Wisata</h3>
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="w-full border rounded-lg p-2" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
            </form>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6 mt-4">
            <h3 class="text-xl font-semibold mb-3">Daftar Kategori Wisata</h3>
            <ul class="list-disc pl-6 mb-4">
                @foreach ($categories as $category)
                    <li class="flex justify-between items-center border-b py-2">
                        <span>{{ $category->nama_kategori }}</span>
                        <form action="{{ route('kategori.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection