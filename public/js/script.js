// Menampilkan modal saat tombol "Lihat Produk Baru" diklik
document.getElementById("show-new-product-modal").addEventListener("click", function() {
    document.getElementById("produk-baru-modal").classList.add("show");
});

// Menutup modal saat tombol "Tutup" diklik
document.getElementById("close-modal").addEventListener("click", function() {
    document.getElementById("produk-baru-modal").classList.remove("show");
});

// Fade-in untuk body
window.onload = function() {
    document.body.classList.add('loaded');
};

// Tambahkan efek fade-in pada produk saat scroll
const fadeInElements = document.querySelectorAll('.fade-in');
window.addEventListener('scroll', () => {
    fadeInElements.forEach(el => {
        if (el.getBoundingClientRect().top < window.innerHeight) {
            el.classList.add('show');
        }
    });
});