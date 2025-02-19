<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 py-10">
        <div class="flex flex-col md:flex-row gap-6 items-start">
            <!-- Image Slider -->
            @if ($ticket->images->count() > 0)
                <div class="relative w-full md:w-1/2 overflow-hidden rounded-md shadow-md">
                    <div class="flex transition-transform duration-500 ease-in-out" id="image-slider">
                        @foreach ($ticket->images as $image)
                        <div class="flex-none w-full flex-shrink-0">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $ticket->name }}"
                                    class="w-full h-[300px] object-cover cursor-pointer transition-transform duration-300 hover:scale-105"
                                    onclick="openModal('{{ asset('storage/' . $image->image_path) }}')">
                            </div>
                        @endforeach
                    </div>
                    <button onclick="moveSlider(-1)"
                        class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-white bg-opacity-75 text-gray-700 p-2 rounded-full shadow-md hover:bg-opacity-100 transition text-sm">
                        ❮
                    </button>
                    <button onclick="moveSlider(1)"
                        class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-white bg-opacity-75 text-gray-700 p-2 rounded-full shadow-md hover:bg-opacity-100 transition text-sm">
                        ❯
                    </button>
                </div>
            @else
                <p class="text-center text-gray-500 py-6">Tidak ada gambar tersedia</p>
            @endif

            <!-- Ticket Details -->
            <div class="w-full md:w-1/2 space-y-3">
                <h1 class="text-2xl font-bold text-gray-800">{{ $ticket->name }}</h1>
                <p class="text-base text-gray-600">{{ $ticket->description }}</p>
                <div class="flex items-center gap-4">
                    <p class="text-lg font-semibold text-orange-500">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                    <span class="text-gray-700 text-sm">Stok: {{ $ticket->quantity }}</span>
                </div>
                <div class="mt-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah Tiket</label>
                    <div class="flex items-center space-x-2">
                        <button onclick="changeQuantity(-1)" class="px-3 py-1 bg-gray-300 rounded-md">-</button>
                        <span id="quantity" class="px-4 py-2 bg-gray-100 rounded-md">1</span>
                        <button onclick="changeQuantity(1)" class="px-3 py-1 bg-gray-300 rounded-md">+</button>
                    </div>
                    <p id="error-message" class="text-red-500 text-sm mt-2 hidden">Out of stock</p>
                </div>
                <div class="mt-4">
                    <a href="#" onclick="buyTicket()"
                        class="inline-block px-6 py-2 text-white font-semibold bg-blue-600 rounded-md shadow-md hover:bg-blue-700 transition-all duration-300">
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
        <div class="relative" onclick="event.stopPropagation()">
            <img id="modal-image" src="" alt="{{ $ticket->name }}"
                class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-lg">
        </div>
    </div>

    <script>
        let currentIndex = 0;
        let quantity = 1;
        let maxQuantity = {{ $ticket->quantity }};

        function openModal(imageUrl) {
            document.getElementById('modal-image').src = imageUrl;
            document.getElementById('image-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('image-modal').classList.add('hidden');
        }

        function closeModalByClickOutside(event) {
            if (event.target.id === 'image-modal') {
                closeModal();
            }
        }

        function moveSlider(direction) {
            const slider = document.getElementById('image-slider');
            const totalImages = {{ $ticket->images->count() }};
            currentIndex = (currentIndex + direction + totalImages) % totalImages;
            slider.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        function changeQuantity(amount) {
            quantity += amount;
            if (quantity < 1) quantity = 1;
            if (quantity > maxQuantity) {
                quantity = maxQuantity;
                document.getElementById('error-message').classList.remove('hidden');
            } else {
                document.getElementById('error-message').classList.add('hidden');
            }
            document.getElementById('quantity').textContent = quantity;
        }

        function buyTicket() {
            if (quantity > maxQuantity) {
                alert('Jumlah tiket melebihi stok yang tersedia');
                return;
            }
            window.location.href = `/checkout?ticket_id={{ $ticket->id }}&quantity=` + quantity;
        }
    </script>
</x-app-layout>