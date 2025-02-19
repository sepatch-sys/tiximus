<x-app-layout>
    <div class="min-h-screen bg-gray-100" x-data="ticketFilter()">
        <!-- Banner Slider -->
        <div class="max-w-7xl mx-auto px-6 pt-0 pb-8 md:pb-10">
            <div x-data="slider()" x-init="start()"
                class="relative w-full h-64 rounded-b-3xl shadow-lg overflow-hidden">
                <!-- Slides -->
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="activeSlide === index"
                        class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-700"
                        :style="'background-image: url(' + image + ');'" x-transition:enter="opacity-0"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="opacity-100" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0">
                    </div>
                </template>

                <!-- Navigasi Dots -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    <template x-for="(image, index) in images" :key="index">
                        <button @click="activeSlide = index"
                            :class="activeSlide === index ? 'bg-white w-4 h-4' : 'bg-gray-400 w-3 h-3'"
                            class="rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>

        <div class="mb-6">
            <div class="flex flex-wrap justify-center gap-6 py-6">
                <!-- Semua Aktivitas Filter -->
                <a @click="selectedCategory = ''" class="group flex flex-col items-center cursor-pointer">
                    <div
                        class="w-36 h-36 flex justify-center items-center rounded-full border-2 border-black group-hover:bg-yellow-500 transition-all shadow-md">
                        <i class="fas fa-th-large text-6xl text-gray-700 group-hover:text-white"></i>
                    </div>
                    <p class="mt-3 font-semibold text-lg text-gray-800 group-hover:text-yellow-500 transition-all">
                        Semua Aktivitas</p>
                </a>

                <!-- Atraksi & Rekreasi Filter -->
                <div @click="selectedCategory = 'Atraksi & Rekreasi'" class="group flex flex-col items-center cursor-pointer">
                    <div
                        class="w-36 h-36 flex justify-center items-center rounded-full border-2 border-black group-hover:bg-yellow-500 transition-all shadow-md">
                        <i class="fas fa-landmark text-6xl text-black group-hover:text-white"></i>
                    </div>
                    <p class="mt-3 font-semibold text-lg text-gray-800 group-hover:text-yellow-500 transition-all">
                        Atraksi & Rekreasi</p>
                </div>

                <!-- Event Filter -->
                <div @click="selectedCategory = 'Event'" class="group flex flex-col items-center cursor-pointer">
                    <div
                        class="w-36 h-36 flex justify-center items-center rounded-full border-2 border-black group-hover:bg-yellow-500 transition-all shadow-md">
                        <i class="fas fa-ticket-alt text-6xl text-black group-hover:text-white"></i>
                    </div>
                    <p class="mt-3 font-semibold text-lg text-gray-800 group-hover:text-yellow-500 transition-all">
                        Event
                    </p>
                </div>

                <!-- Tour Filter -->
                <div @click="selectedCategory = 'Tour'" class="group flex flex-col items-center cursor-pointer">
                    <div
                        class="w-36 h-36 flex justify-center items-center rounded-full border-2 border-black group-hover:bg-yellow-500 transition-all shadow-md">
                        <i class="fas fa-flag text-6xl text-black group-hover:text-white"></i>
                    </div>
                    <p class="mt-3 font-semibold text-lg text-gray-800 group-hover:text-yellow-500 transition-all">
                        Tour
                    </p>
                </div>
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto px-6 py-8 md:py-10">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Semua Tiket</h2>

            @if ($tickets->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                    @foreach ($tickets as $ticket)
                        <a href="{{ route('user-show-ticket', ['id' => $ticket->id]) }}"
                            x-show="selectedCategory === '' || selectedCategory === '{{ $ticket->category }}'"
                            class="block bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                            @if ($ticket->images->first())
                                <img src="{{ asset('storage/' . $ticket->images->first()->image_path) }}"
                                    alt="{{ $ticket->name }}" class="w-full h-40 object-cover">
                            @else
                                <p class="text-center text-gray-500 py-10">Tidak ada gambar yang tersedia</p>
                            @endif
                            <div class="p-4 flex flex-col h-auto">
                                <h3 class="text-base font-semibold text-gray-800 truncate">{{ $ticket->name }}</h3>
                                <p class="text-gray-600 text-sm mt-1 line-clamp-2">
                                    {{ Str::limit($ticket->description, 60) }}
                                </p>
                                <p class="text-lg font-semibold text-orange-500 mt-2">Rp
                                    {{ number_format($ticket->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 text-center">Belum ada tiket yang tersedia.</p>
            @endif
        </div>
    </div>
</x-app-layout>

<script>
    function slider() {
        return {
            activeSlide: 0,
            images: [
                '/images/dufan.jpeg',
                '/path/to/your/second-image.jpg',
                '/images/pestapora.png',
            ],
            start() {
                setInterval(() => {
                    this.activeSlide = (this.activeSlide + 1) % this.images.length;
                }, 3000);
            }
        }
    }

    function ticketFilter() {
        return {
            selectedCategory: ''
        }
    }
</script>
