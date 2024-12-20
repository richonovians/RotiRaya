@if(auth()->user()->hasRole('admin'))
    <x-app-layout>
        <div class="container mx-auto px-6 py-12">
            <!-- Judul Halaman -->
            <h1 class="text-4xl font-bold text-center text-blue-700 mb-10">Edit Produk</h1>

            <!-- Tampilkan Pesan Sukses -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <!-- Form Edit Produk -->
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-lg p-8 max-w-3xl mx-auto" novalidate>
                @csrf
                @method('PUT')

                <!-- Nama Produk -->
                <div class="mb-6">
                    <label for="nama_produk" class="block text-lg font-medium text-gray-700">Nama Produk</label>
                    <input type="text" 
                        class="w-full mt-2 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm @error('nama_produk') border-red-500 @enderror" 
                        id="nama_produk" 
                        name="nama_produk" 
                        value="{{ old('nama_produk', $produk->nama_produk) }}"
                        placeholder="Masukkan nama produk" 
                        required>
                    @error('nama_produk')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-6">
                    <label for="deskripsi" class="block text-lg font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 
                            @error('deskripsi') border-red-500 @enderror"
                        placeholder="Masukkan deskripsi produk">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Harga -->
                <div class="mb-6">
                    <label for="harga" class="block text-lg font-semibold text-gray-700 mb-2">Harga</label>
                    <input type="number" name="harga" id="harga" 
                        value="{{ old('harga', $produk->harga) }}" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 
                            @error('harga') border-red-500 @enderror"
                        placeholder="Masukkan harga produk" required>
                    @error('harga')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stok -->
                <div class="mb-6">
                    <label for="stok" class="block text-lg font-semibold text-gray-700 mb-2">Stok</label>
                    <input type="number" name="stok" id="stok" 
                        value="{{ old('stok', $produk->stok) }}" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 
                            @error('stok') border-red-500 @enderror"
                        placeholder="Masukkan stok produk" required>
                    @error('stok')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Foto Produk -->
                <div class="mb-6">
                    <label for="foto" class="block text-lg font-semibold text-gray-700 mb-2">Foto Produk</label>
                    <input type="file" name="foto" id="foto" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 
                            @error('foto') border-red-500 @enderror">
                    @error('foto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if ($produk->foto)
                        <img src="data:image/jpeg;base64,{{ base64_encode($produk->foto) }}" alt="Foto Produk" class="mt-4 rounded-md w-32">
                    @endif
                </div>

                <!-- Tombol Aksi -->
                <div class="flex items-center justify-end space-x-4">
                    <button type="submit" class="flex-1 py-2 px-4 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-300 text-center">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('produk') }}" 
                    class="py-2 px-6 bg-blue-300 text-gray-700 font-bold rounded-lg shadow-md hover:bg-gray-400 transition duration-300">
                    Batal
                    </a>
                </div>
            </form>
        </div>
    </x-app-layout>
@else
    <x-app-layout>
        <div class="container mx-auto px-6 py-12 text-center">
            <p class="text-xl font-bold text-red-500">Anda tidak memiliki akses ke halaman ini.</p>
        </div>
    </x-app-layout>
@endif
