<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Capstone Coffee</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
    rel="stylesheet" />

  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <script src="https://unpkg.com/feather-icons"></script>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>
  <nav class="navbar">
    <div class="navbar-logo">
      <img src="{{ asset('img/logo.jpg') }}" alt="Capstone Coffee Logo" class="logo-img" />
      <a href="{{ route('home') }}">Capstone <span>Coffee.</span></a>
    </div>

    <div class="navbar-nav">
      <a href="#home">Home</a>
      <a href="#about">Tentang Kami</a>
      <a href="#menu">Menu</a>
    </div>

    <div class="navbar-extra">
      <a href="#" id="hamburger-menu"><i class="fas fa-bars"></i></a>
    </div>
  </nav>

  <section class="hero" id="home">
    <main class="content">
      <h1>Your Deadline's <span>Best Friend</span></h1>

      <a href="{{ route('book') }}" class="cta">BOOK A TABLE</a>

      <a href="{{ route('order') }}" class="cta">ORDER NOW</a>
    </main>
  </section>

  <section id="about" class="about">
    <h2><span>Tentang</span> Kami</h2>

    <div class="row">
      <div class="about-img">
        <img src="{{ asset('img/about.jpg') }}" alt="Barista sedang meracik kopi" />
      </div>

      <div class="content">
        <h3>Why Capstone Coffee?</h3>
        <p>
          Capstone Coffee terinspirasi dari semangat mahasiswa akhir yang
          berjuang menyelesaikan tugas akhirnya — penuh fokus, dedikasi, dan
          passion. Kami percaya, setiap cangkir kopi punya peran dalam
          menemani perjalanan menuju “puncak” pencapaian seseorang. Dengan
          racikan barista berpengalaman dan biji kopi berkualitas, Capstone
          Coffee menjadi tempat di mana semangat, ide, dan cita rasa bertemu.
        </p>
      </div>
    </div>
  </section>

  <section id="menu" class="menu">
    <h2><span>Menu</span> Kami</h2>

    <div class="menu-container">

      <div class="menu-card">
        <img src="{{ asset('img/espresso.jpg') }}" alt="Espresso" class="menu-card-img" />
        <h3 class="menu-card-title">- Espresso -</h3>
        <p class="menu-card-desc">Sajian kopi murni dengan cita rasa kuat dan aroma tajam.</p>
        <p class="menu-card-price">IDR 25K</p>
      </div>

      <div class="menu-card">
        <img src="{{ asset('img/americano.jpg') }}" alt="Americano" class="menu-card-img" />
        <h3 class="menu-card-title">- Americano -</h3>
        <p class="menu-card-desc">Kombinasi espresso dan air panas, menghasilkan rasa ringan namun tetap beraroma.</p>
        <p class="menu-card-price">IDR 20K</p>
      </div>

      <div class="menu-card">
        <img src="{{ asset('img/cappucino.jpg') }}" alt="Cappuccino" class="menu-card-img" />
        <h3 class="menu-card-title">- Cappuccino -</h3>
        <p class="menu-card-desc">Perpaduan espresso, susu panas, dan busa susu lembut dalam satu cangkir.</p>
        <p class="menu-card-price">IDR 27K</p>
      </div>

      <div class="menu-card">
        <img src="{{ asset('img/machiato.jpg') }}" alt="Macchiato" class="menu-card-img" />
        <h3 class="menu-card-title">- Macchiato -</h3>
        <p class="menu-card-desc">Espresso dengan sedikit busa susu di atasnya perpaduan kuat dan lembut di dalam satu cangkir kecil.</p>
        <p class="menu-card-price">IDR 27K</p>
      </div>

      <div class="menu-card">
        <img src="{{ asset('img/matcha latte.jpg') }}" alt="Matcha latte" class="menu-card-img" />
        <h3 class="menu-card-title">- Matcha latte -</h3>
        <p class="menu-card-desc">Sajian hangat atau dingin yang memadukan bubuk teh hijau matcha berkualitas tinggi dengan susu lembut.</p>
        <p class="menu-card-price">IDR 30K</p>
      </div>

      <div class="menu-card">
        <img src="{{ asset('img/picolo latte.jpg') }}" alt="Picolo latte" class="menu-card-img" />
        <h3 class="menu-card-title">- Picolo latte -</h3>
        <p class="menu-card-desc">Espresso shot dengan sedikit susu steamed kecil tapi penuh rasa.</p>
        <p class="menu-card-price">IDR 23K</p>
      </div>

      <div class="menu-card">
        <img src="{{ asset('img/affogato.jpg') }}" alt="Affogato" class="menu-card-img" />
        <h3 class="menu-card-title">- Affogato -</h3>
        <p class="menu-card-desc">Perpaduan hangat espresso dan lembutnya es krim vanila dalam satu sajian manis.</p>
        <p class="menu-card-price">IDR 32K</p>
      </div>

      <div class="menu-card">
        <img src="{{ asset('img/oreo latte.jpg') }}" alt="Oreo latte" class="menu-card-img" />
        <h3 class="menu-card-title">- Oreo latte -</h3>
        <p class="menu-card-desc">Perpaduan lembut kopi dan manisnya Oreo dalam satu rasa creamy.</p>
        <p class="menu-card-price">IDR 27K</p>
      </div>

      <div class="menu-card">
        <img src="{{ asset('img/biscoff frappe.jpg') }}" alt="biscoff frappe" class="menu-card-img" />
        <h3 class="menu-card-title">- Biscoff Frappe -</h3>
        <p class="menu-card-desc">Campuran kopi dingin dan biskuit Biscoff yang creamy dan karamel manis.</p>
        <p class="menu-card-price">IDR 32K</p>
      </div>

      <div class="menu-card">
        <img src="{{ asset('img/pistachio latte.jpg') }}" alt="pistachio latte" class="menu-card-img" />
        <h3 class="menu-card-title">- Pistachio latte -</h3>
        <p class="menu-card-desc">Paduan lembut kopi dan gurih manis kacang pistachio yang menenangkan.</p>
        <p class="menu-card-price">IDR 28K</p>
      </div>

    </div>
  </section>
  <script src="{{ asset('js/script.js') }}"></script>

  @push('scripts')
  <script>
    feather.replace();
  </script>

  <script>
    const navbarNav = document.querySelector(".navbar-nav");
    const hamburger = document.querySelector("#hamburger-menu");
    if (hamburger && navbarNav) {

      hamburger.addEventListener("click", (e) => {
        e.preventDefault();
        navbarNav.classList.toggle("active");
      });

      document.addEventListener("click", function(e) {
        if (
          !hamburger.contains(e.target) &&
          !navbarNav.contains(e.target)
        ) {
          navbarNav.classList.remove("active");
        }
      });
    }
  </script>
  @endpush
  @include('layouts.footer')

</body>

</html>