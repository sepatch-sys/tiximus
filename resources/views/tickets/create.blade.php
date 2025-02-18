<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Ticket') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-4 text-gray-800">Add Ticket</h2>

        <form action="{{ route('tickets.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf

            {{-- Category Province --}}
            <div>
                <label for="category_province_id" class="block text-sm font-medium text-gray-700">Category
                    Province</label>
                <select name="category_province_id" id="category_province_id"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select Province</option>
                    @foreach ($categoryProvinces as $province)
                        <option value="{{ $province->id }}"
                            {{ old('category_province_id') == $province->id ? 'selected' : '' }}>
                            {{ $province->province_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_province_id')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Category Tourism --}}
            <div>
                <label for="category_tourism_id" class="block text-sm font-medium text-gray-700">Category
                    Tourism</label>
                <select name="category_tourism_id" id="category_tourism_id"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select Tourism</option>
                    @foreach ($categoryTourisms as $tourism)
                        <option value="{{ $tourism->id }}"
                            {{ old('category_tourism_id') == $tourism->id ? 'selected' : '' }}>
                            {{ $tourism->tourism_name }}
                        </option>
                    @endforeach
                </select>
                @error('category_tourism_id')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Ticket Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Ticket Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required value="{{ old('name') }}">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price --}}
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required value="{{ old('price') }}">
                @error('price')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Ticket Date --}}
            <div>
                <label for="ticket_date" class="block text-sm font-medium text-gray-700">Ticket Date</label>
                <input type="date" name="ticket_date" id="ticket_date"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required value="{{ old('ticket_date') }}">
                @error('ticket_date')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="images" class="block text-sm font-medium text-gray-700">Upload Images</label>
                <input type="file" name="images[]" id="images"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    accept="image/*" onchange="previewImages(event)" multiple required>
                @error('images.*')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
                <div id="imagePreview" class="grid grid-cols-4 gap-2 mt-2"></div>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center space-x-2 mt-4">
                <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center space-x-2">
                    <i class="fas fa-save"></i> <span>Save</span>
                </button>
                <a href="{{ route('tickets.index') }}"
                    class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition flex items-center space-x-2">
                    <i class="fas fa-arrow-left"></i> <span>Back</span>
                </a>
            </div>
        </form>
    </div>

    <script>
        function previewImages(event) {
            let previewContainer = document.getElementById('imagePreview');
            previewContainer.innerHTML = '';

            let files = event.target.files;
            if (files) {
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        let imgElement = document.createElement('img');
                        imgElement.src = e.target.result;
                        imgElement.className = "w-24 h-24 object-cover rounded-lg shadow";
                        previewContainer.appendChild(imgElement);
                    };
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>
</x-app-layout>
