// Navbar animasi scroll
const navbar = document.getElementById("navbar");
window.addEventListener("scroll", function() {
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

// Smooth scroll untuk link navbar
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function(event) {
        event.preventDefault();
        document.querySelector(this.getAttribute("href")).scrollIntoView({
            behavior: "smooth"
        });
    });
});

// Animasi fade-in, slide-in, dan scale-up saat scroll
document.addEventListener("scroll", function() {
    const fadeIns = document.querySelectorAll(".fade-in");
    const slideIns = document.querySelectorAll(".slide-in");
    const scaleUps = document.querySelectorAll(".scale-up");
    const triggerHeight = window.innerHeight * 0.8;

    fadeIns.forEach(element => {
        const rect = element.getBoundingClientRect();
        if (rect.top < triggerHeight) {
            element.classList.add("show");
        }
    });

    slideIns.forEach(element => {
        const rect = element.getBoundingClientRect();
        if (rect.top < triggerHeight) {
            element.classList.add("show");
        }
    });

    scaleUps.forEach(element => {
        const rect = element.getBoundingClientRect();
        if (rect.top < triggerHeight) {
            element.classList.add("show");
        }
    });
});