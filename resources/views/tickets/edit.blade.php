<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            Edit Ticket
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-semibold text-indigo-700 mb-4">Edit Ticket</h2>

        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Ticket Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2"
                    required value="{{ old('name', $ticket->name) }}">
                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2"
                    required value="{{ old('price', $ticket->price) }}">
                @error('price')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="ticket_date" class="block text-sm font-medium text-gray-700">Ticket Date</label>
                <input type="date" name="ticket_date" id="ticket_date"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2"
                    required value="{{ old('ticket_date', $ticket->ticket_date) }}">
                @error('ticket_date')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2">{{ old('description', $ticket->description) }}</textarea>
                @error('description')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" name="quantity" id="quantity" min="1"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2"
                    required value="{{ old('quantity', $ticket->quantity) }}">
                @error('quantity')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>            

            <div>
                <label class="block text-sm font-medium text-gray-700">Current Images</label>
                <div class="flex flex-wrap gap-4 mt-2">
                    @foreach ($ticket->images as $image)
                        <div class="relative inline-block">
                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                class="w-24 h-24 object-cover rounded-lg shadow">

                            <label
                                class="absolute -top-2 -right-2 bg-red-500 text-white p-1 w-6 h-6 text-center 
                      flex items-center justify-center rounded-full cursor-pointer text-sm">
                                <input type="checkbox" name="deleted_images[]" value="{{ $image->id }}"
                                    class="hidden">
                                ✖
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div>
                <label for="images" class="block text-sm font-medium text-gray-700">Upload New Images</label>
                <input type="file" name="images[]" id="images" multiple
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2"
                    accept="image/*" onchange="previewImages(event)">
                <div id="image-preview" class="flex flex-wrap gap-4 mt-2"></div>
                @error('images.*')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('tickets.index') }}"
                    class="bg-gray-400 text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition">
                    <i class="fas fa-arrow-left"></i> Back
                </a>

                <button type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>

    <script>
        function previewImages(event) {
            let previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = "";
            Array.from(event.target.files).forEach(file => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("w-24", "h-24", "object-cover", "rounded-lg", "shadow");
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
</x-app-layout>
