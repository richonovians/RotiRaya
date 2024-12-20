<x-app-layout>
    <!-- Pemesanan Section -->
    <section id="pemesanan" class="py-16 px-6 bg-gray-200">
        <h2 class="text-4xl font-bold text-center text-blue-600 mb-12" data-aos="fade-up">Cara Pemesanan</h2>
        
        <div class="max-w-3xl mx-auto grid gap-10 sm:grid-cols-1 md:grid-cols-2">
            <!-- Pemesanan via WhatsApp -->
            <div class="bg-gradient-to-br from-green-100 to-green-200 p-8 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300" data-aos="fade-right">
                <h3 class="text-2xl font-semibold text-green-700 mb-4">Pemesanan via WhatsApp</h3>
                <p class="text-lg text-gray-700 mb-4">Pesan roti favorit Anda dengan mudah melalui WhatsApp kami. Klik tombol di bawah ini untuk terhubung langsung:</p>
                <a href="https://wa.me/6285903761921" target="_blank" class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 transform hover:scale-110 transition duration-300">
                    Pesan via WhatsApp
                </a>
                <p class="text-sm text-gray-500 mt-2">Nomor WhatsApp: 085-903-761-921</p>
            </div>

            <!-- Pemesanan Langsung di Outlet -->
            <div class="bg-gradient-to-br from-blue-100 to-blue-200 p-8 rounded-lg shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300" data-aos="fade-left">
                <h3 class="text-2xl font-semibold text-blue-700 mb-4">Pemesanan Langsung di Outlet</h3>
                <p class="text-lg text-gray-700">Kami melayani pemesanan langsung di outlet kami. Kunjungi outlet terdekat dan pilih roti favorit Anda langsung di tempat. Kami siap melayani Anda!</p>
            </div>
        </div>

        <!-- Lokasi Maps -->
        <div class="mt-16 max-w-3xl mx-auto" data-aos="fade-up">
            <h3 class="text-2xl font-semibold text-center text-blue-600 mb-8">Lokasi Kami di Kudus</h3>
            <div class="rounded-lg overflow-hidden shadow-lg">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.895491196473!2d110.84190871477822!3d-6.80442929508348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b819bce65a9%3A0x5027a76e356f0a0!2sKudus%2C%20Kabupaten%20Kudus%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1699999999999!5m2!1sid!2sid" 
                    width="100%" 
                    height="400" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    {{-- <footer class="bg-gradient-to-r from-blue-500 to-green-500 text-white py-8">
        <div class="container mx-auto text-center">
            <p>&copy; BLUDER COKRO</p>
        </div>
    </footer> --}}

    <!-- AOS Animation Initialization -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000, // Animation duration
            offset: 200,    // Offset to start animations
        });
    </script>
</x-app-layout>
