<x-app-layout>
    <!-- Hero Section -->
    <section class="text-center py-20 bg-blue-600 text-white" style="background: url('images/12.jpg') center/cover;">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-extrabold mb-4 fade-in">Selamat Datang di Nindy Bakery</h1>
            <p class="text-lg font-medium">Nikmati Beragam Roti dengan Cita Rasa Tak Tertandingi!</p>
        </div>
    </section>
    <div class="container mx-auto px-6 py-12">
        <!-- Produk Section -->
        <section id="produk" class="py-16 px-6 bg-gray-50 rounded-lg shadow-md">
            <h2 class="text-4xl font-bold text-center text-blue-600 mb-12 fade-in">Produk Kami</h2>
            
            <!-- Tombol Tambah Produk -->
            <div class="flex justify-between mb-8">
                <a href="{{ route('produk.create') }}" 
                   class="py-2 px-5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300 text-sm shadow-md">
                    Tambah Produk
                </a>
                <a href="{{ route('produk.trashed') }}" 
                   class="py-2 px-5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition duration-300 text-sm shadow-md">
                    Lihat Produk yang Dihapus
                </a>
            </div>
            
            <!-- Produk Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach ($produks as $produk)
                    <!-- Card Produk -->
                    <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105 product-card fade-in">
                        <img src="data:image/jpeg;base64,{{ base64_encode($produk->foto) }}" alt="Foto Produk" class="w-full h-48 object-cover rounded-lg mb-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $produk->nama_produk }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($produk->deskripsi, 100) }}</p>
                        <p class="text-lg font-semibold text-blue-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

                        <!-- Tombol Aksi -->
                        <div class="flex mt-6 space-x-4">
                            <!-- Tombol Edit -->
                            <a href="{{ route('produk.edit', $produk->id) }}" 
                               class="py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300 text-center w-full">
                                Edit
                            </a>

                            <!-- Tombol Delete hanya untuk admin -->
                            @if(auth()->user()->hasRole('admin'))
                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="py-2 px-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-300 text-center w-full">
                                        Hapus
                                    </button>
                                </form>
                            @else
                                <!-- Pesan jika bukan admin -->
                                <p class="text-sm text-gray-500">Anda tidak memiliki izin untuk menghapus produk ini.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-app-layout>
