<x-app-layout>
    <link rel="stylesheet" href="style.css">
    <script src="{{ asset('js/visi-misi.js') }}" defer></script>
    <body class="font-sans bg-gray-100">

        <!-- Hero Section -->
        <section id="home" class="h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('images/12.jpg'); background-size: cover; background-position: center;">
            <div class="text-center fade-in show scale-up px-4">
                <h1 class="text-5xl font-extrabold text-white fade-in delay-1 opacity-90 hover:opacity-100 transition duration-300">Selamat Datang di Nindy Bakery</h1>
                <p class="text-lg text-white fade-in delay-1 opacity-80 hover:opacity-100 transition duration-300">Nikmati roti lezat dan penuh rasa yang akan memanjakan lidah Anda.</p>
            </div>
        </section>

        <!-- Visi dan Misi Section -->
        <section id="visi-misi" class="py-16 px-6 bg-white">
            <h2 class="text-4xl font-bold text-center mb-12 text-blue-600 fade-in delay-1">Visi & Misi Kami</h2>
            
            <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12">
                <!-- Visi -->
                <div class="bg-gray-200 p-8 rounded-lg shadow-xl transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 ease-in-out">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-6">Visi Kami</h3>
                    <p class="text-lg text-gray-700 leading-relaxed">Menjadi pemimpin dalam industri roti dengan menyajikan produk yang selalu segar, berkualitas tinggi, dan dapat dinikmati oleh semua kalangan. Kami ingin menjadikan setiap potong roti sebagai pengalaman yang tak terlupakan.</p>
                </div>

                <!-- Misi -->
                <div class="bg-gray-200 p-8 rounded-lg shadow-xl transition-transform transform hover:scale-105 hover:shadow-2xl duration-300 ease-in-out">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-6">Misi Kami</h3>
                    <ul class="list-disc list-inside text-lg text-gray-700 space-y-4">
                        <li>Menawarkan roti dengan bahan baku terbaik dan resep rahasia yang unik.</li>
                        <li>Menciptakan pengalaman berbelanja yang menyenangkan dan memuaskan bagi pelanggan.</li>
                        <li>Terus berinovasi dalam menciptakan varian roti yang sesuai dengan selera pasar.</li>
                        <li>Membangun hubungan jangka panjang dengan pelanggan melalui kualitas dan pelayanan yang konsisten.</li>
                    </ul>
                </div>
            </div>
        </section>

    </body>
</x-app-layout>
