@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Tambah Kategori Provinsi</h2>

    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <form action="{{ route('kategori_provinsi.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Nama Provinsi</label>
                <input type="text" name="nama_provinsi" class="w-full border rounded-lg p-2" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</div>
@endsection
