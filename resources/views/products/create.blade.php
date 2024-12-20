@if(auth()->user()->hasRole('admin'))
    <x-app-layout>
        <div class="container mx-auto py-10 px-4 md:px-8">
            <!-- Judul Halaman -->
            <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Tambah Produk</h1>

            <!-- Form Tambah Produk -->
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 md:p-8 shadow-lg rounded-lg border border-gray-200" novalidate>
                @csrf
                
                <!-- Input Nama Produk -->
                <div class="mb-6">
                    <label for="nama_produk" class="block text-lg font-medium text-gray-700">Nama Produk</label>
                    <input type="text" 
                        class="w-full mt-2 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm @error('nama_produk') border-red-500 @enderror" 
                        id="nama_produk" 
                        name="nama_produk" 
                        value="{{ old('nama_produk') }}" 
                        placeholder="Masukkan nama produk" 
                        required>
                    @error('nama_produk')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Deskripsi -->
                <div class="mb-6">
                    <label for="deskripsi" class="block text-lg font-medium text-gray-700">Deskripsi</label>
                    <textarea class="w-full mt-2 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm @error('deskripsi') border-red-500 @enderror" 
                              id="deskripsi" 
                              name="deskripsi" 
                              placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Harga -->
                <div class="mb-6">
                    <label for="harga" class="block text-lg font-medium text-gray-700">Harga</label>
                    <input type="number" 
                           class="w-full mt-2 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm @error('harga') border-red-500 @enderror" 
                           id="harga" 
                           name="harga" 
                           value="{{ old('harga') }}" 
                           placeholder="Masukkan harga produk" 
                           required>
                    @error('harga')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Stok -->
                <div class="mb-6">
                    <label for="stok" class="block text-lg font-medium text-gray-700">Stok</label>
                    <input type="number" 
                           class="w-full mt-2 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm @error('stok') border-red-500 @enderror" 
                           id="stok" 
                           name="stok" 
                           value="{{ old('stok') }}" 
                           placeholder="Masukkan stok produk" 
                           required>
                    @error('stok')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Input Foto Produk -->
                <div class="mb-6">
                    <label for="foto" class="block text-lg font-medium text-gray-700">Foto Produk</label>
                    <input type="file" 
                           class="w-full mt-2 px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm @error('foto') border-red-500 @enderror" 
                           id="foto" 
                           name="foto">
                    @error('foto')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit dan Batal -->
                <div class="flex justify-center items-center space-x-4">
                    <!-- Tombol Simpan -->
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-6 rounded-lg shadow-md transition-all duration-300">
                        Simpan
                    </button>
                    <!-- Tombol Batal -->
                    <a href="{{ route('produk') }}" 
                       class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-6 rounded-lg shadow-md transition-all duration-300">
                       Batal
                    </a>
                </div>
            </form>
        </div>
    </x-app-layout>
@else
    <!-- Konten untuk pengguna selain admin -->
    <p class="text-center text-red-500 font-bold mt-10">Anda tidak memiliki akses ke halaman ini.</p>
@endif
