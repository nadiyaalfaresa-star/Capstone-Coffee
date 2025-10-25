// Ambil elemen Navigasi dan Hamburger Menu
const navbarNav = document.querySelector(".navbar-nav");
const hamburger = document.querySelector("#hamburger-menu"); // Didefinisikan ulang di sini

// Tambahkan Event Listener untuk Toggle Nav
// Menggunakan addEventListener lebih modern dan fleksibel
hamburger.addEventListener("click", (e) => {
  // Mencegah link pindah halaman, yang sudah di lakukan di HTML (e.preventDefault)
  e.preventDefault();
  navbarNav.classList.toggle("active");
});

// Event Listener untuk Klik di Luar Sidebar (Menutup Nav)
document.addEventListener("click", function (e) {
  // Pastikan navbarNav dan hamburger sudah ada sebelum membandingkan
  if (
    e.target !== hamburger &&
    !hamburger.contains(e.target) &&
    !navbarNav.contains(e.target)
  ) {
    navbarNav.classList.remove("active");
  }
});
