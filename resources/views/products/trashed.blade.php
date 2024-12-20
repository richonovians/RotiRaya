<x-app-layout>
    <div class="container mx-auto px-6 py-12">
        <!-- Cek jika pengguna adalah admin -->
        @if(auth()->user()->hasRole('admin'))
            <!-- Produk Dihapus Section -->
            <section id="produk-trashed" class="py-16 px-6 bg-gray-50 rounded-lg shadow-md">
                <h2 class="text-4xl font-bold text-center text-blue-600 mb-12">Produk yang Dihapus</h2>

                <!-- Check if there are no deleted products -->
                @if ($produks->isEmpty())
                    <div class="text-center text-lg text-gray-600">
                        <p>Data kosong.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                        @foreach ($produks as $produk)
                            <!-- Card Produk yang Dihapus -->
                            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 transform hover:scale-105 product-card">
                                <img src="data:image/jpeg;base64,{{ base64_encode($produk->foto) }}" alt="Foto Produk" class="w-full h-48 object-cover rounded-lg mb-6">
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $produk->nama_produk }}</h3>
                                <p class="text-gray-600 mb-4">{{ Str::limit($produk->deskripsi, 100) }}</p>
                                <p class="text-lg font-semibold text-blue-600">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>

                                <!-- Tombol Aksi untuk Mengembalikan atau Menghapus Permanen -->
                                <div class="flex mt-6 space-x-4">
                                    <!-- Tombol Restore -->
                                    <form action="{{ route('produk.restore', $produk->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin mengembalikan produk ini?');" class="w-full">
                                        @csrf
                                        <button type="submit" class="py-2 px-4 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-300 text-center w-full">
                                            Kembalikan
                                        </button>
                                    </form>

                                    <!-- Tombol Force Delete -->
                                    <form action="{{ route('produk.forceDelete', $produk->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini permanen?');" class="w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="py-2 px-4 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition duration-300 text-center w-full">
                                            Hapus Permanen
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>
        @else
            <!-- Konten untuk pengguna selain admin -->
            <div class="text-center text-lg text-gray-600">
                <p>Anda tidak memiliki akses ke halaman ini.</p>
            </div>
        @endif
    </div>
</x-app-layout>
