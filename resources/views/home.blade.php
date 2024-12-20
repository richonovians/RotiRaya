<x-app-layout>
    <section id="home" class="h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('images/1.jpg');">
        <div class="text-center text-white fade-in">
            <h1 class="text-5xl font-extrabold mb-4">Welcome to Nindy Bakery</h1>
            <p class="text-lg mb-8">We are glad you are here. Explore our services and learn more about our vision and mission.</p>
            <a href="{{ route('visimisi') }}" class="bg-blue-500 hover:bg-blue-700 text-white px-6 py-3 rounded-full text-lg transition transform hover:scale-105">Pelajari Lebih Dalam</a>
            
        </div>
    </section>
    <section id="services" class="py-16 px-6 bg-gray-200">
        <h2 class="text-3xl font-bold text-center mb-8 fade-in">New Product Launch</h2>
        <div class="text-center fade-in mb-8">
            <p class="text-lg">Introducing our latest products, fresh out of the oven! Discover the unique taste and quality.</p>
        </div>
        <div class="flex flex-col items-center md:flex-row md:justify-center gap-8">
            <!-- Product 1 -->
            <div class="product-card bg-white p-6 rounded-lg shadow-lg fade-in">
                <img src="images/product1.jpg" alt="Choco Delight" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-4">Produk Baru: Choco Delight</h3>
                <p class="text-gray-700">A delightful chocolate-flavored bread, perfect for chocolate lovers.</p>
            </div>

            <!-- Product 2 -->
            <div class="product-card bg-white p-6 rounded-lg shadow-lg fade-in">
                <img src="images/product2.jpg" alt="Berry Blast" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-4">Produk Baru: Berry Blast</h3>
                <p class="text-gray-700">A fruity bread infused with fresh berries for a refreshing taste.</p>
            </div>

            <!-- Product 3 -->
            <div class="product-card bg-white p-6 rounded-lg shadow-lg fade-in">
                <img src="images/product3.jpeg" alt="Matcha Green" class="w-full h-48 object-cover rounded-lg mb-4">
                <h3 class="text-xl font-semibold mb-4">Produk Baru: Matcha Green</h3>
                <p class="text-gray-700">A unique green tea-flavored bread, combining health and taste.</p>
            </div>
        </div>
    </section>
</x-app-layout>
