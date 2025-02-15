<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Province Category List') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-semibold mb-4">Province Category List</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
            <h3 class="text-xl font-semibold mb-3">List of Provinces</h3>
            <ul class="list-disc pl-6 mb-4">
                @foreach ($categoryProvinces as $category)
                    <li class="flex justify-between items-center border-b py-2">
                        <div class="flex items-center">
                            @if ($category->province_image)
                                <img src="{{ asset('storage/' . $category->province_image) }}" 
                                     alt="Province Image" 
                                     class="w-12 h-12 object-cover rounded-lg mr-3">
                            @endif
                            <span>{{ $category->province_name }}</span>
                        </div>
                        <form action="{{ route('category_province.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
