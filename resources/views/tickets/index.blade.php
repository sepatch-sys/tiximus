@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Daftar Tiket</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2 text-left">Nama</th>
                    <th class="border px-4 py-2 text-left">Harga</th>
                    <th class="border px-4 py-2 text-left">Deskripsi</th>
                    <th class="border px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $ticket->name }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($ticket->price, 2, ',', '.') }}</td>
                        <td class="border px-4 py-2">{{ $ticket->description }}</td>
                        <td class="border px-4 py-2 text-center space-x-2">
                            <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a>
                            <button class="text-red-500 hover:text-red-700 delete-ticket" data-id="{{ $ticket->id }}">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.delete-ticket').forEach(button => {
        button.addEventListener('click', function () {
            let ticketId = this.dataset.id;
            if (confirm("Apakah Anda yakin ingin menghapus tiket ini?")) {
                alert("Tiket dengan ID " + ticketId + " dihapus!");
            }
        });
    });
</script>
@endpush
