<x-app-layout>
    <section class="text-center py-20 bg-blue-600 text-white" style="background: url('images/12.jpg') center/cover;"> 
        <h2 class="text-5xl font-bold mb-6" data-aos="fade-up">Selamat Datang di Nindy Bakery</h2>
        <p class="text-lg" data-aos="fade-up" data-aos-delay="100">Nikmati berbagai layanan kami untuk memenuhi kebutuhan Anda</p>
        <a href="#layanan" class="mt-8 inline-block bg-white text-blue-600 font-bold py-3 px-8 rounded-full shadow-lg transform hover:scale-105 transition duration-300" data-aos="fade-up" data-aos-delay="200">Jelajahi Layanan Kami</a>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="py-16 px-6 bg-gray-200">
        <h2 class="text-4xl font-extrabold text-center text-blue-700 mb-12" data-aos="fade-up">Layanan Kami</h2>
        
        <div class="container mx-auto grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Jam Buka -->
            <div class="bg-gradient-to-r from-blue-200 to-white p-8 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300" data-aos="zoom-in" data-aos-delay="100">
                <h3 class="text-2xl font-semibold text-blue-700 mb-4">Jam Buka</h3>
                <p class="text-lg text-gray-700">Senin - Jumat: 08:00 - 20:00</p>
                <p class="text-lg text-gray-700">Sabtu - Minggu: 09:00 - 21:00</p>
            </div>

            <!-- Alamat Utama -->
            <div class="bg-gradient-to-r from-blue-200 to-white p-8 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300" data-aos="zoom-in" data-aos-delay="200">
                <h3 class="text-2xl font-semibold text-blue-700 mb-4">Alamat Utama</h3>
                <p class="text-lg text-gray-700">Jl. Roti No. 123, Madiun, Indonesia</p>
                <p class="text-lg text-gray-700">Telepon: (021) 123-4567</p>
            </div>

            <!-- Outlet yang Tersedia -->
            <div class="bg-gradient-to-r from-blue-200 to-white p-8 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300" data-aos="zoom-in" data-aos-delay="300">
                <h3 class="text-2xl font-semibold text-blue-700 mb-4">Outlet yang Tersedia</h3>
                <ul class="text-lg text-gray-700 list-inside list-disc">
                    <li>Outlet Kota Madiun - Jl. Merdeka No. 45</li>
                    <li>Outlet Kabupaten Madiun - Jl. Patriot No. 23</li>
                    <li>Outlet Kabupaten Ngawi - Jl. Bintaro Raya No. 5</li>
                    <li>Outlet Kabupaten Magetan - Jl. Asia Afrika No. 89</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Inisialisasi AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            offset: 200,
        });
    </script>
</x-app-layout>
