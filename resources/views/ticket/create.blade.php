@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Tambah Tiket</div>

                <div class="card-body">
                    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Nama Tiket -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Tiket</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="wisata">Wisata</option>
                                <option value="event">Event</option>
                                <option value="rekreasi">Rekreasi</option>
                            </select>
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga Tiket (Rp)</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <!-- Gambar -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Upload Gambar</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success">Tambah Tiket</button>
                        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
