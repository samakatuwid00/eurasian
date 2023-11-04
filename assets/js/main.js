//navbar
document.addEventListener('DOMContentLoaded', () => {
    const closeIcon = document.querySelector('.close-icon'); // New line
    const ctaContainer = document.querySelector('.navbar-cta-container');   
    const navbarIcon = document.querySelector('.navbar-icon');
    const navbarMenu = document.querySelector('.navbar-menu');

    navbarIcon.addEventListener('click', () => {
        navbarMenu.classList.toggle('active');
    });

    closeIcon.addEventListener('click', () => { // New block
        navbarMenu.classList.remove('active');
        ctaContainer.classList.remove('active');
    });

    // Close the dropdown and cta-container if clicked outside
    document.addEventListener('click', (event) => {
        if (
            !navbarIcon.contains(event.target) &&
            !navbarMenu.contains(event.target) &&
            !ctaContainer.contains(event.target)
        ) {
            navbarMenu.classList.remove('active');
            ctaContainer.classList.remove('active');
        }
    });

    // Close the dropdown when clicking on a menu item
    navbarMenu.addEventListener('click', () => {
        navbarMenu.classList.remove('active');
        ctaContainer.classList.remove('active');
    });
});

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1,
            nav: false
        },
        600: {
            items: 2,
            nav: false
        },
        1000: {
            items: 3,
            nav: false,
            loop: false
        }
    }
});

$('.testimonial-carousel').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    nav: true,
    responsiveClass: true
});
document.addEventListener('DOMContentLoaded', () => {
    const carousel = $('.testimonial-carousel');
    carousel.owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        nav: false
    });

    const customPrevBtn = document.querySelector('.custom-owl-prev');
    const customNextBtn = document.querySelector('.custom-owl-next');

    customPrevBtn.addEventListener('click', () => {
        carousel.trigger('prev.owl.carousel');
    });

    customNextBtn.addEventListener('click', () => {
        carousel.trigger('next.owl.carousel');
    });
});

// JavaScript for toggling the registration form and overlay
document.addEventListener("DOMContentLoaded", function () {
    const registerButton = document.querySelector(".registration-button");
    const overlay = document.querySelector(".overlay");
    const registrationForm = document.querySelector(".registration-form");

    registerButton.addEventListener("click", function () {
        overlay.style.display = "block";
        registrationForm.style.display = "block";
    });

    overlay.addEventListener("click", function () {
        overlay.style.display = "none";
        registrationForm.style.display = "none";
    });
});
// JavaScript to add animation to the register button when clicked
document.querySelector(".button").addEventListener("click", function() {
    this.classList.add("animate");
});

const slides = document.querySelectorAll('.slide');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
let currentSlide = 0;

function showSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index) {
            slide.style.display = 'block';
        } else {
            slide.style.display = 'none';
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

nextButton.addEventListener('click', nextSlide);
prevButton.addEventListener('click', prevSlide);

// Auto-play the slider
setInterval(nextSlide, 5000); // Change slide every 5 seconds
showSlide(currentSlide);

