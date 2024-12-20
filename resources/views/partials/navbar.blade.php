<nav id="navbar" class="bg-gradient-to-r from-blue-500 to-green-500 text-white p-4 fixed w-full z-10 flex justify-between items-center">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="flex items-center">
            <img src="images/cake.png" alt="Logo Roti Lezat" class="h-8 w-8 mr-2">
            <span class="text-2xl font-bold">Nindy Bakery</span>
        </a>
        <div class="hidden md:flex space-x-4">
            <a href="/home" class="hover:bg-blue-500 transition duration-200 ease-in-out px-4 py-2 rounded">Home</a>
            <a href="/produk" class="hover:bg-blue-500 transition duration-200 ease-in-out px-4 py-2 rounded">Produk</a>
            <a href="/layanan" class="hover:bg-blue-500 transition duration-200 ease-in-out px-4 py-2 rounded">Layanan</a>
            <a href="/pemesanan" class="hover:bg-blue-500 transition duration-200 ease-in-out px-4 py-2 rounded">Pemesanan</a>
            
            <!-- Tombol Logout -->
            <form method="POST" action="/logout" class="inline">
                @csrf
                <button type="submit" class="hover:bg-red-500 transition duration-200 ease-in-out px-4 py-2 rounded bg-red-600">
                    Logout
                </button>
            </form>
        </div>
        <button id="menu-toggle" class="block md:hidden focus:outline-none text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>
    <div id="mobile-menu" class="hidden md:hidden flex flex-col space-y-2 mt-4 bg-blue-600 w-full text-center">
        <a href="/home" class="block hover:bg-blue-500 px-4 py-2 rounded">Home</a>
        <a href="/produk" class="block hover:bg-blue-500 px-4 py-2 rounded">Produk</a>
        <a href="/layanan" class="block hover:bg-blue-500 px-4 py-2 rounded">Layanan</a>
        <a href="/pemesanan" class="block hover:bg-blue-500 px-4 py-2 rounded">Pemesanan</a>

        <!-- Tombol Logout untuk Mobile -->
        <form method="POST" action="/logout" class="block w-full">
            @csrf
            <button type="submit" class="w-full text-left hover:bg-red-500 transition duration-200 ease-in-out px-4 py-2 rounded bg-red-600">
                Logout
            </button>
        </form>
    </div>
</nav>
