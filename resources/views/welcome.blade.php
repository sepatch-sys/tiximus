<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Banner Slider -->
        <div class="max-w-7xl mx-auto px-6 pt-0 pb-8 md:pb-10">
            <div x-data="slider()" x-init="start()" class="relative w-full h-64 rounded-b-3xl shadow-lg overflow-hidden">
                <!-- Slides -->
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="activeSlide === index"
                         class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-700"
                         :style="'background-image: url(' + image + ');'" 
                         x-transition:enter="opacity-0" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                         x-transition:leave="opacity-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
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

        <!-- Kotak Penjelasan -->
        <div class="w-full py-8 md:py-10 px-6 shadow-lg text-center bg-gradient-to-r from-orange-500 via-yellow-400 to-blue-400 animate-[gradientShift_5s_infinite_alternate]">
            <h2 class="text-3xl font-bold text-white">Selamat Datang!</h2>
            <p class="mt-4 text-white max-w-3xl mx-auto">
                Kami menghadirkan berbagai atraksi, event, dan rekreasi terbaik untuk Anda.
                Dapatkan pengalaman seru dan kemudahan dalam membeli tiket secara online melalui platform kami.
            </p>
        </div>

        <!-- Kategori Aktivitas -->
        <div class="flex flex-wrap justify-center gap-6 py-6">
            @foreach(['Semua Aktivitas' => 'th-large', 'Atraksi & Rekreasi' => 'landmark', 'Event' => 'ticket-alt', 'Tour' => 'flag'] as $title => $icon)
                <div class="group flex flex-col items-center cursor-pointer">
                    <div class="w-36 h-36 flex justify-center items-center rounded-full border-2 border-black group-hover:bg-yellow-500 transition-all shadow-md">
                        <i class="fas fa-{{ $icon }} text-6xl text-black group-hover:text-white"></i>
                    </div>
                    <p class="mt-3 font-semibold text-lg text-gray-800 group-hover:text-yellow-500 transition-all">{{ $title }}</p>
                </div>
            @endforeach
        </div>

        <!-- Daftar Tiket -->
        <div class="max-w-7xl mx-auto px-6 py-8 md:py-10">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Rekomendasi Tempat Wisata</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach ($tickets as $ticket)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                        <!-- Gambar Wisata (Proporsional) -->
                        <img src="{{ asset('storage/' . $ticket->image) }}" alt="{{ $ticket->name }}" class="w-full aspect-video object-cover">

                        <!-- Konten -->
                        <div class="p-3 flex flex-col h-auto">
                            <h3 class="text-base font-semibold text-gray-800 truncate">{{ $ticket->name }}</h3>
                            <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ Str::limit($ticket->description, 80) }}</p>
                            <p class="text-lg font-bold text-orange-500 mt-2">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                            <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm text-center">Beli Tiket</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Eksplorasi Wisata -->
        <div class="max-w-7xl mx-auto px-6 py-8 md:py-10">
            <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Jelajahi wisata di Indonesia</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 justify-center">
                @foreach ($provinces->take(5) as $province)
                    <div class="relative w-48 h-72 mx-auto rounded-3xl overflow-hidden shadow-lg group">
                        <img src="{{ asset('storage/' . $province->province_image) }}" alt="{{ $province->province_name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <h3 class="text-xl font-semibold text-white text-center px-4">{{ $province->province_name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Rekomendasi Provinsi -->
        <div class="max-w-7xl mx-auto px-6 py-8 md:py-10">
            <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Rekomendasi Provinsi</h2>

            @php
                $randomProvince = $provinces->random();
                $provinceTickets = $tickets->where('category_province_id', $randomProvince->id)->take(5);
            @endphp

            <div class="relative overflow-hidden">
                <div class="flex items-start gap-6 transition-transform duration-500" id="province-container">
                    <div class="relative w-48 h-72 rounded-3xl overflow-hidden shadow-lg group flex-shrink-0" id="province-card">
                        <img src="{{ asset('storage/' . $randomProvince->province_image) }}" alt="{{ $randomProvince->province_name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <h3 class="text-xl font-semibold text-white text-center px-4">{{ $randomProvince->province_name }}</h3>
                        </div>
                    </div>

                    <!-- Daftar Tiket -->
                    <div class="flex space-x-4 overflow-x-auto scrollbar-hide" id="ticket-list">
                        @foreach ($provinceTickets as $ticket)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden flex-shrink-0 w-64 p-4 border-l-4 border-blue-500">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $ticket->name }}</h3>
                                <p class="text-gray-600 mt-1">{{ Str::limit($ticket->description, 100) }}</p>
                                <p class="text-lg font-bold text-orange-500 mt-2">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500">Tanggal: {{ \Carbon\Carbon::parse($ticket->ticket_date)->format('d M Y') }}</p>
                                <a href="#" class="inline-block mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Beli Tiket</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        @keyframes gradientShift {
            0%, 100% {
                background-size: 200% 200%;
                background-position: left center;
            }
            50% {
                background-size: 200% 200%;
                background-position: right center;
            }
        }
    </style>

    <script>
        document.getElementById('ticket-list').addEventListener('scroll', function() {
            let provinceCard = document.getElementById('province-card');
            provinceCard.style.opacity = this.scrollLeft > 50 ? '0' : '1';
            provinceCard.style.transition = 'opacity 0.5s ease';
        });

        function slider() {
            return {
                activeSlide: 0,
                images: [
                    '{{ asset('images/pestapora.png') }}',
                    '{{ asset('images/dufan.jpeg') }}',
                    '{{ asset('images/image3.jpg') }}'
                ],
                start() {
                    setInterval(() => {
                        this.activeSlide = (this.activeSlide + 1) % this.images.length;
                    }, 3000);
                }
            };
        }
    </script>
</x-app-layout>
