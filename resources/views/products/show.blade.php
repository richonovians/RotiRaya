<x-app-layout>
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold text-center text-blue-700 mb-10">{{ $produk->nama_produk }}</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <img src="data:image/jpeg;base64,{{ base64_encode($produk->foto) }}" alt="Foto Produk" class="w-full h-48 object-cover rounded-lg mb-4">
            <p class="text-gray-700">{{ $produk->deskripsi }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $produk->stok }}</p>
        </div>

        <!-- Kondisi untuk admin -->
        @if(auth()->user()->hasRole('admin'))
            <div class="mt-6">
                <p>Selamat datang, Admin!</p>
                <!-- Bisa menambahkan tombol atau link tambahan untuk admin di sini -->
            </div>
        @else
            <div class="mt-6">
                <p>Anda tidak memiliki akses ke halaman ini.</p>
            </div>
        @endif

        <div class="mt-6">
            <a href="{{ route('produk') }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Kembali</a>
        </div>
    </div>
</x-app-layout>
