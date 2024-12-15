let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times'); // Mengganti ikon menu
    navbar.classList.toggle('active');  // Menampilkan atau menyembunyikan navbar
};

window.onscroll = () => {
    menu.classList.remove('fa-times'); // Menghapus kelas saat menggulir
    navbar.classList.remove('active');  // Menyembunyikan navbar saat menggulir
};

// Inisialisasi Swiper untuk slider
var swiper = new Swiper(".home-slider", {
    loop: true, // Mengulangi slide
    navigation: {
        nextEl: ".swiper-button-next", // Tombol next
        prevEl: ".swiper-button-prev",  // Tombol previous
    },
    autoplay: {
        delay: 4000, // Mengganti slide setiap 3 detik
        disableOnInteraction: false, // Tidak menghentikan autoplay saat berinteraksi
    },
});
