<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book A Table - Capstone Coffee</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://unpkg.com/feather-icons"></script>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

  @if (session('success'))
  <style>
    .alert-success-box {
      background-color: #38c172;
      color: white;
      padding: 1.5rem;
      margin-top: 5rem;
      text-align: center;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 9998;
      font-weight: bold;
    }
  </style>
  @endif
</head>

<body>
  <nav class="navbar">
    <div class="navbar-logo">
      <img src="{{ asset('img/logo.jpg') }}" alt="Capstone Coffee Logo" class="logo-img" />
      <a href="{{ route('home') }}">Capstone <span>Coffee.</span></a>
    </div>

    <div class="navbar-nav">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('home') }}#about">Tentang Kami</a>
      <a href="{{ route('order') }}">Order Now</a>
    </div>
    <div class="navbar-extra">
      <a href="#" id="hamburger-menu"><i class="fas fa-bars"></i></a>
    </div>
  </nav>
  @if (session('success'))
  <div class="alert-success-box">
    {{ session('success') }}
  </div>
  <script>
    // Logika alert bawaan browser setelah submit sukses
    alert('RESERVASI BERHASIL DITERIMA!\n\nHarap datang 10 menit sebelum jam yang ditentukan untuk konfirmasi ulang!');
    setTimeout(() => {
      document.querySelector('.alert-success-box').style.display = 'none';
    }, 5000);
  </script>
  @endif
  
  <section class="book" id="book">
    <h2><span>Book</span> A Table</h2>
    <p>
      Nikmati suasana nyaman dan sajian kopi terbaik kami. Pesan meja terlebih
      dahulu untuk memastikan tempatmu tersedia!
    </p>

    <div class="book-container">
      <form action="{{ route('reservation.submit') }}" method="POST" id="reservation-form" class="book-form">
        @csrf

        <h3>Reservation Form</h3>

        <div class="input-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required />
        </div>

        <div class="input-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Enter your email" required />
        </div>

        <div class="input-group">
          <label for="date">Date</label>
          <input type="date" id="date" name="date" required />
        </div>

        <div class="input-group">
          <label for="time">Time</label>
          <select id="time" name="time" required style="width: 100%; padding: 0.7rem; border-radius: 0.5rem; background: #222; color: #fff;">
            <option value="">Pilih Jam</option>
            <option value="08:00">08:00 AM</option>
            <option value="09:00">09:00 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="11:00">11:00 AM</option>
            <option value="12:00">12:00 PM</option>
            <option value="13:00">01:00 PM</option>
            <option value="14:00">02:00 PM</option>
            <option value="15:00">03:00 PM</option>
            <option value="16:00">04:00 PM</option>
            <option value="17:00">05:00 PM</option>
            <option value="18:00">06:00 PM</option>
            <option value="19:00">07:00 PM</option>
            <option value="20:00">08:00 PM</option>
            <option value="21:00">09:00 PM</option>
            <option value="22:00">10:00 PM</option>
            <option value="23:00">11:00 PM</option>
          </select>
        </div>

        <div class="input-group">
          <label for="people">Number of People</label>
          <input type="number" id="people" name="people" placeholder="2" min="1" required />
        </div>

        <div class="input-group">
          <label for="message">Special Request</label>
          <textarea id="message" name="message" rows="3" placeholder="Any request..."></textarea>
        </div>

        <button type="submit" class="btn">Submit Reservation</button>
      </form>

      <div class="info-section">
        <div class="map">
          <h3>Find Us Here</h3>
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.0271830585145!2d110.36607367500463!3d-7.879904892623602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a578f4a7593c9%3A0x7b60483fdd2cc30c!2sCapstone%20Coffee!5e0!3m2!1sen!2sid!4v1697639406547!5m2!1sen!2sid"
            width="100%"
            height="250"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"></iframe>
        </div>

        <div class="hours">
          <h3>Opening Hours</h3>
          <ul>
            <li>Monday - Friday: <span>08:00 - 22:00</span></li>
            <li>Saturday: <span>09:00 - 23:00</span></li>
            <li>Sunday: <span>09:00 - 21:00</span></li>
          </ul>
        </div>
      </div>
    </div>
    </div>

  </section>
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

  @include('layouts.footer')

</body>

</html>