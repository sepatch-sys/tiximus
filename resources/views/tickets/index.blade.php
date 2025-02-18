<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Ticket List
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-semibold mb-4">Ticket List</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">{{ session('success') }}</div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('tickets.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                + Add Ticket
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">Image</th>
                        <th class="border px-4 py-2 text-left">Name</th>
                        <th class="border px-4 py-2 text-left">Price</th>
                        <th class="border px-4 py-2 text-left">Description</th>
                        <th class="border px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">
                                @if ($ticket->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $ticket->images->first()->image_path) }}" 
                                         alt="{{ $ticket->name }}" 
                                         class="w-12 h-12 object-cover rounded">
                                @else
                                    <span>No image</span>
                                @endif
                            </td>                                                               
                            <td class="border px-4 py-2">{{ $ticket->name }}</td>
                            <td class="border px-4 py-2">Rp {{ number_format($ticket->price, 2, ',', '.') }}</td>
                            <td class="border px-4 py-2">{{ $ticket->description }}</td>
                            <td class="border px-4 py-2 text-center space-x-2">
                                <a href="{{ route('tickets.edit', $ticket->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Edit</a>

                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700"
                                        onclick="return confirm('Are you sure you want to delete this ticket?');">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
