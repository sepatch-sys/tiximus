<x-app-layout>
    <div class="min-h-screen bg-gray-100">
        <!-- Banner Slider -->
        <div class="max-w-7xl mx-auto px-6">
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

        <!-- Kotak Penjelasan -->
        <div
            class="w-full py-12 px-6 mt-10 shadow-lg text-center bg-gradient-to-b from-orange-500 via-yellow-400 to-blue-400 animate-color-shift">
            <h2 class="text-3xl font-bold text-white">Selamat Datang!</h2>
            <p class="mt-4 text-white max-w-3xl mx-auto">
                Kami menghadirkan berbagai atraksi, event, dan rekreasi terbaik untuk Anda.
                Dapatkan pengalaman seru dan kemudahan dalam membeli tiket secara online melalui platform kami.
            </p>
        </div>

        <!-- Daftar Tiket -->
        <div class="max-w-7xl mx-auto px-6 mt-12">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Tiket Tersedia</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($tickets as $ticket)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">{{ $ticket->name }}</h3>
                            <p class="text-gray-600 mt-2">{{ Str::limit($ticket->description, 100) }}</p>
                            <p class="text-lg font-bold text-orange-500 mt-4">Rp
                                {{ number_format($ticket->price, 0, ',', '.') }}</p>
                            <p class="text-sm text-gray-500 mt-2">Tanggal:
                                {{ \Carbon\Carbon::parse($ticket->ticket_date)->format('d M Y') }}</p>
                            <a href="#"
                                class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Beli
                                Tiket</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-6 mt-12">
            <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Pilih Provinsi</h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6 justify-center">
                @foreach ($provinces->take(5) as $province)
                    <div class="relative w-48 h-72 mx-auto rounded-3xl overflow-hidden shadow-lg group">
                        <img src="{{ asset('storage/' . $province->province_image) }}"
                            alt="{{ $province->province_name }}"
                            class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">

                        <!-- Overlay dengan Nama Provinsi -->
                        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                            <h3 class="text-xl font-semibold text-white text-center px-4">{{ $province->province_name }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        <div class="max-w-7xl mx-auto px-6 mt-12">
            <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Rekomendasi Provinsi</h2>

            @php
                $randomProvince = $provinces->random();
                $provinceTickets = $tickets->where('province_id', $randomProvince->id);
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <!-- Gambar Provinsi -->
                <div class="w-full h-80 rounded-xl overflow-hidden shadow-lg">
                    <img src="{{ asset('storage/' . $randomProvince->province_image) }}"
                        alt="{{ $randomProvince->province_name }}" class="w-full h-full object-cover">
                </div>
            </div>
            <!-- Daftar Tiket di Provinsi -->
            <div>
                <h3 class="text-xl font-bold text-gray-800">{{ $randomProvince->province_name }}</h3>
                <div class="mt-4 space-y-4">
                    @foreach ($tickets as $ticket)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800">{{ $ticket->name }}</h3>
                                <p class="text-gray-600 mt-2">{{ Str::limit($ticket->description, 100) }}</p>
                                <p class="text-lg font-bold text-orange-500 mt-4">Rp
                                    {{ number_format($ticket->price, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500 mt-2">Tanggal:
                                    {{ \Carbon\Carbon::parse($ticket->ticket_date)->format('d M Y') }}</p>
                                <a href="#"
                                    class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Beli
                                    Tiket</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
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
                    }, 3000); // Auto-slide setiap 3 detik
                }
            };
        }
    </script>
</x-app-layout>
