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
                         x-transition:enter="opacity-0" x-transition:enter-start="opacity-0"
                         x-transition:enter-end="opacity-100"
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

        <!-- Kotak Penjelasan -->
        <div class="w-full py-8 md:py-10 px-6 shadow-lg text-center bg-gradient-to-r from-orange-500 via-yellow-400 to-blue-400 animate-wave-background">
            <h2 class="text-3xl font-bold text-white">Selamat Datang!</h2>
            <p class="mt-4 text-white max-w-3xl mx-auto">
                Kami menghadirkan berbagai atraksi, event, dan rekreasi terbaik untuk Anda.
                Dapatkan pengalaman seru dan kemudahan dalam membeli tiket secara online melalui platform kami.
            </p>
        </div>

        <!-- Kategori Aktivitas -->
        <form method="GET" action="{{ route('home.index') }}" class="mb-6">
            <div class="flex flex-wrap justify-center gap-6 py-6">
                <!-- Semua Aktivitas Filter -->
                <div class="group flex flex-col items-center cursor-pointer">
                    <button type="submit" name="category_tourism_id" value=""
                            class="w-36 h-36 flex justify-center items-center rounded-full border-2 border-black group-hover:bg-yellow-500 transition-all shadow-md">
                        <i class="fas fa-th-large text-6xl text-gray-700 group-hover:text-white"></i>
                    </button>
                    <p class="mt-3 font-semibold text-lg text-gray-800 group-hover:text-yellow-500 transition-all">Semua Aktivitas</p>
                </div>

                <!-- Atraksi & Rekreasi Filter -->
                <div class="group flex flex-col items-center cursor-pointer">
                    <button type="submit" name="category_tourism_id" value="1"
                            class="w-36 h-36 flex justify-center items-center rounded-full border-2 border-black group-hover:bg-yellow-500 transition-all shadow-md">
                        <i class="fas fa-landmark text-6xl text-black group-hover:text-white"></i>
                    </button>
                    <p class="mt-3 font-semibold text-lg text-gray-800 group-hover:text-yellow-500 transition-all">Atraksi & Rekreasi</p>
                </div>

                <!-- Event Filter -->
                <div class="group flex flex-col items-center cursor-pointer">
                    <button type="submit" name="category_tourism_id" value="2"
                            class="w-36 h-36 flex justify-center items-center rounded-full border-2 border-black group-hover:bg-yellow-500 transition-all shadow-md">
                        <i class="fas fa-ticket-alt text-6xl text-black group-hover:text-white"></i>
                    </button>
                    <p class="mt-3 font-semibold text-lg text-gray-800 group-hover:text-yellow-500 transition-all">Event</p>
                </div>

                <!-- Tour Filter -->
                <div class="group flex flex-col items-center cursor-pointer">
                    <button type="submit" name="category_tourism_id" value="3"
                            class="w-36 h-36 flex justify-center items-center rounded-full border-2 border-black group-hover:bg-yellow-500 transition-all shadow-md">
                        <i class="fas fa-flag text-6xl text-black group-hover:text-white"></i>
                    </button>
                    <p class="mt-3 font-semibold text-lg text-gray-800 group-hover:text-yellow-500 transition-all">Tour</p>
                </div>
            </div>
        </form>

        <!-- Daftar Tiket -->
        <div class="max-w-7xl mx-auto px-6 py-8 md:py-10">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Rekomendasi Tempat Wisata</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @if ($tickets->isNotEmpty())
                    @foreach ($tickets as $ticket)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-300 hover:scale-105">
                            @if ($ticket->images->first())
                                <img src="{{ asset('storage/' . $ticket->images->first()->image_path) }}" alt="{{ $ticket->name }}" class="w-full h-40 object-cover">
                            @else
                                <p class="text-center text-gray-500 py-10">Tidak ada gambar yang tersedia</p>
                            @endif
                            <div class="p-4 flex flex-col h-auto">
                                <h3 class="text-base font-semibold text-gray-800 truncate">{{ $ticket->name }}</h3>
                                <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ Str::limit($ticket->description, 60) }}</p>
                                <p class="text-lg font-semibold text-orange-500 mt-2">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                                <a href="{{ route('user-show-ticket', ['id' => $ticket->id]) }}" class="inline-block mt-3 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm text-center">
                                    Beli Tiket
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500 text-center">Belum ada tiket yang tersedia.</p>
                @endif
            </div>
        </div>        

        <!-- Eksplorasi Wisata -->
        <div class="max-w-7xl mx-auto px-6 py-8 md:py-10">
            <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Jelajahi wisata di Indonesia</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 justify-end">
                @if ($provinces->isNotEmpty())
                    @foreach ($provinces->take(5) as $province)
                        <div class="relative w-48 h-72 mx-auto rounded-3xl overflow-hidden shadow-lg group">
                            <img src="{{ asset('storage/' . $province->province_image) }}" alt="{{ $province->province_name }}"
                                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                <h3 class="text-xl font-semibold text-white text-center px-4">{{ $province->province_name }}</h3>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500 text-center">Belum ada data provinsi.</p>
                @endif
            </div>
        </div>

        <!-- Rekomendasi Provinsi -->
        <div class="max-w-7xl mx-auto px-6 py-8 md:py-10">
            <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Rekomendasi Provinsi</h2>
            @if ($provinces->isNotEmpty())
                @php
                    $randomProvince = $provinces->random();
                    $provinceTickets = $tickets->where('category_province_id', $randomProvince->id)->take(5);
                @endphp

                <div class="relative overflow-hidden">
                    <div class="flex items-start gap-6 transition-transform duration-500" id="province-container">
                        <!-- Kategori Provinsi -->
                        <div class="relative w-48 h-72 rounded-3xl overflow-hidden shadow-lg group flex-shrink-0">
                            <img src="{{ asset('storage/' . $randomProvince->province_image) }}" alt="{{ $randomProvince->province_name }}"
                                 class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                                <h3 class="text-xl font-semibold text-white text-center px-4">{{ $randomProvince->province_name }}</h3>
                            </div>
                        </div>

                        <!-- Daftar Tiket -->
                        <div class="flex space-x-4 overflow-x-auto scrollbar-hide">
                            @foreach ($provinceTickets as $ticket)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden flex-shrink-0 w-64 p-4 border-l-4 border-blue-500">
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $ticket->name }}</h3>
                                    <p class="text-gray-600 mt-1">{{ Str::limit($ticket->description, 100) }}</p>
                                    <p class="text-lg font-bold text-orange-500 mt-2">Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                                    <a href="{{ route('user-show-ticket', ['id' => $ticket->id]) }}" class="inline-block mt-3 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors text-sm text-center">
                                        Beli Tiket
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <p class="text-gray-500 text-center">Tidak ada provinsi yang tersedia.</p>
            @endif
        </div>
    </div>
</x-app-layout>

<style>
    @keyframes waveBackground {
        0% {
            background-position: 0 0;
        }
        50% {
            background-position: 100% 0;
        }
        100% {
            background-position: 0 0;
        }
    }

    .animate-wave-background {
        background-size: 200% 200%;
        animation: waveBackground 10s linear infinite;
    }
</style>

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
</script>
