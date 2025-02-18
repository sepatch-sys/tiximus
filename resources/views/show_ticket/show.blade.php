<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-10">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Gambar-gambar yang bisa digeser -->
            @if ($ticket->images->count() > 0)
                <div class="relative">
                    <!-- Image Slider -->
                    <div class="overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-in-out" id="image-slider">
                            @foreach ($ticket->images as $image)
                                <div class="flex-none w-full">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $ticket->name }}"
                                        class="w-full h-72 object-cover rounded-lg cursor-pointer transition-transform duration-300 hover:scale-105 hover:shadow-xl"
                                        onclick="openModal('{{ asset('storage/' . $image->image_path) }}')">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Previous and Next Buttons -->
                    <button onclick="moveSlider(-1)"
                        class="absolute top-1/2 left-0 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-3 rounded-full shadow-lg hover:bg-opacity-75 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </button>
                    <button onclick="moveSlider(1)"
                        class="absolute top-1/2 right-0 transform -translate-y-1/2 text-white bg-black bg-opacity-50 p-3 rounded-full shadow-lg hover:bg-opacity-75 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>
                </div>
            @else
                <p class="text-center text-gray-500 py-10">Tidak ada gambar yang tersedia</p>
            @endif

            <div class="p-6 space-y-4">
                <h2 class="text-2xl font-extrabold text-gray-800">{{ $ticket->name }}</h2>
                <p class="text-base text-gray-600">{{ $ticket->description }}</p>

                <div class="flex justify-between items-center mt-4">
                    <p class="text-xl font-semibold text-orange-500">Rp {{ number_format($ticket->price, 0, ',', '.') }}
                    </p>
                    <a href="#"
                        class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-colors duration-200 ease-in-out">
                        Beli Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Image -->
    <div id="image-modal"
        class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center hidden transition-opacity duration-300"
        onclick="closeModalByClickOutside(event)">
        <div class="relative" onclick="event.stopPropagation()"> <!-- Cegah klik pada gambar untuk menutup modal -->
            <img id="modal-image" src="" alt="{{ $ticket->name }}"
                class="max-w-full max-h-full object-contain rounded-lg shadow-lg transition-transform duration-300">
        </div>
    </div>

    <script>
        let currentIndex = 0;

        // Open modal with clicked image
        function openModal(imageUrl) {
            document.getElementById('modal-image').src = imageUrl;
            document.getElementById('image-modal').classList.remove('hidden');
            document.getElementById('image-modal').classList.add('opacity-100');
        }

        // Close modal
        function closeModal() {
            document.getElementById('image-modal').classList.add('hidden');
            document.getElementById('image-modal').classList.remove('opacity-100');
        }

        // Close modal when clicking outside of the image
        function closeModalByClickOutside(event) {
            if (event.target.id === 'image-modal') {
                closeModal();
            }
        }

        // Move slider
        function moveSlider(direction) {
            const slider = document.getElementById('image-slider');
            const totalImages = {{ $ticket->images->count() }};
            currentIndex = (currentIndex + direction + totalImages) %
            totalImages; // Calculate next index, ensuring it wraps around
            const offset = -currentIndex * 100; // Calculate how much to move the slider
            slider.style.transform = `translateX(${offset}%)`;
        }
    </script>
</x-app-layout>
