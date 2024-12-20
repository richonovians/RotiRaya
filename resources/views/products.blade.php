<x-app-layout>
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-500 to-green-500 text-white py-16 px-6">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold mb-4 fade-in">Selamat Datang di Nindy Bakery</h1>
            <p class="text-lg font-medium">Nikmati Beragam Roti dengan Cita Rasa Tak Tertandingi!</p>
        </div>
    </section>

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center p-4">
            <h1 class="text-2xl font-bold text-blue-600 hover:text-green-500 transition duration-300">Bluder Cokro</h1>
            <div>
                <a href="{{ url('home') }}" class="text-gray-700 hover:text-blue-500 font-medium transition duration-300">Home</a>
            </div>
        </div>
    </nav>

    <!-- Produk Section -->
    <section id="produk" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center text-blue-600 mb-12 fade-in">Produk Kami</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach ($produks as $produk)
                    <!-- Kartu Produk -->
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <img src="{{ asset('storage/' . $produk->foto) }}" 
                             alt="{{ $produk->nama_produk }}" 
                             class="w-full h-64 object-cover mb-4 rounded-lg hover:scale-105 transition-transform duration-300">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $produk->nama_produk }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($produk->deskripsi, 100) }}</p>
                        <p class="text-lg font-bold text-green-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal Produk Baru -->
    <div id="produk-baru-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex justify-center items-center">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 max-w-4xl">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Produk Baru Akan Launching!</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Product 1 -->
                <div class="p-4 bg-gray-50 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <img src="images/product1.jpg" alt="Choco Delight" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Choco Delight</h3>
                    <p class="text-gray-600">Roti coklat yang nikmat untuk pecinta coklat.</p>
                </div>
                <!-- Product 2 -->
                <div class="p-4 bg-gray-50 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <img src="images/product2.jpg" alt="Berry Blast" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Berry Blast</h3>
                    <p class="text-gray-600">Roti dengan rasa buah beri yang menyegarkan.</p>
                </div>
                <!-- Product 3 -->
                <div class="p-4 bg-gray-50 rounded-lg shadow hover:shadow-md transition-shadow duration-300">
                    <img src="images/product3.jpeg" alt="Matcha Green" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Matcha Green</h3>
                    <p class="text-gray-600">Roti dengan cita rasa unik teh hijau.</p>
                </div>
            </div>
            <div class="text-center mt-6">
                <button id="close-modal" class="bg-red-500 text-white px-6 py-2 rounded-lg shadow hover:bg-red-600 transition duration-300">Tutup</button>
            </div>
        </div>
    </div>

    <!-- Script untuk Modal -->
    <script>
        document.getElementById('show-new-product-modal')?.addEventListener('click', function () {
            document.getElementById('produk-baru-modal').classList.remove('hidden');
        });
        document.getElementById('close-modal')?.addEventListener('click', function () {
            document.getElementById('produk-baru-modal').classList.add('hidden');
        });
    </script>
</x-app-layout>
