<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order di Tempat - Capstone Coffee</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://unpkg.com/feather-icons"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

  <style>
    .order-page-padding { padding-top: 6rem; min-height: 100vh; }
    .menu-list-container { flex-grow: 2; }
    .menu-card .btn-order { background-color: var(--primary); color: #fff; border: none; padding: 0.6rem 1.5rem; border-radius: 0.5rem; cursor: pointer; margin-top: 1rem; transition: 0.3s ease; }
    .menu-card .btn-order:hover { background-color: #a3764f; }
    .order-checkout-box { position: sticky; top: 10rem; }
    .order-form-container input { padding: 0.8rem 0.7rem; border-radius: 0.5rem; background: #222; color: #fff; border: 1px solid #333; }
    .order-form-container label { font-weight: 600; color: #ccc; }
    .qty-btn { background: #333; color: #fff; border: none; padding: 0.1rem 0.5rem; font-size: 1rem; cursor: pointer; border-radius: 0.2rem; }
    .qty-btn:hover { background: #555; }
    #cart-summary li { display: flex; justify-content: space-between; align-items: center; font-size: 1rem; margin-bottom: 0.8rem; color: #ccc; }
    #cart-summary li .item-controls { display: flex; align-items: center; gap: 0.5rem; }
  </style>
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
      <a href="{{ route('book') }}">Book A Table</a>
    </div>
    <div class="navbar-extra">
      <a href="#" id="hamburger-menu"><i class="fas fa-bars"></i></a>
    </div>
  </nav>

  <section id="order-page" class="book order-page-padding">
    <h2><span>Pesan</span> di Tempat</h2>
    <p>Pilih menu favoritmu di bawah ini, masukkan nomor meja, dan lakukan pembayaran di kasir dengan menunjukkan ID Pesananmu.</p>

    <div class="book-container" id="order-layout">
      <div class="menu-list-container">
        <h3 style="color: var(--primary); margin-bottom: 2rem; text-align: left">Daftar Menu</h3>
        <div class="menu-container">

          <div class="menu-card">
            <img src="{{ asset('img/espresso.jpg') }}" alt="Espresso" class="menu-card-img" />
            <h3 class="menu-card-title">- Espresso -</h3>
            <p class="menu-card-desc">Sajian kopi murni dengan cita rasa kuat.</p>
            <p class="menu-card-price">IDR 25K</p>
            <button type="button" class="btn-order" data-item="Espresso" data-price="25000">Tambahkan</button>
          </div>

        <div class="menu-card"> <img src="{{ asset('img/americano.jpg') }}" alt="Americano" class="menu-card-img" /> 
          <h3 class="menu-card-title">- Americano -</h3> 
          <p class="menu-card-desc">Kombinasi espresso dan air panas, menghasilkan rasa ringan namun tetap beraroma.</p> 
          <p class="menu-card-price">IDR 20K</p> 
          <button type="button" class="btn-order" data-item="Americano" data-price="20000">Tambahkan</button> 
        </div>

        <div class="menu-card"> <img src="{{ asset('img/cappucino.jpg') }}" alt="Cappuccino" class="menu-card-img" /> 
         <h3 class="menu-card-title">- Cappuccino -</h3> 
         <p class="menu-card-desc">Perpaduan espresso, susu panas, dan busa susu lembut dalam satu cangkir.</p> 
         <p class="menu-card-price">IDR 27K</p> 
         <button type="button" class="btn-order" data-item="Cappuccino" data-price="27000">Tambahkan</button> 
         </div>

        <div class="menu-card"> <img src="{{ asset('img/machiato.jpg') }}" alt="Macchiato" class="menu-card-img" /> 
         <h3 class="menu-card-title">- Macchiato -</h3> 
         <p class="menu-card-desc">Espresso dengan sedikit busa susu di atasnya perpaduan kuat dan lembut di dalam satu cangkir kecil.</p> 
         <p class="menu-card-price">IDR 27K</p> 
         <button type="button" class="btn-order" data-item="Macchiato" data-price="27000">Tambahkan</button> 
         </div> 
        
        <div class="menu-card"> <img src="{{ asset('img/matcha latte.jpg') }}" alt="Matcha latte" class="menu-card-img" /> 
         <h3 class="menu-card-title">- Matcha latte -</h3> 
         <p class="menu-card-desc">Sajian hangat atau dingin yang memadukan bubuk teh hijau matcha berkualitas tinggi dengan susu lembut.</p> 
         <p class="menu-card-price">IDR 30K</p> 
         <button type="button" class="btn-order" data-item="Matcha Latte" data-price="30000">Tambahkan</button> 
        </div> 
        
        <div class="menu-card"> <img src="{{ asset('img/picolo latte.jpg') }}" alt="Picolo latte" class="menu-card-img" /> 
        <h3 class="menu-card-title">- Picolo latte -</h3> 
        <p class="menu-card-desc">Espresso shot dengan sedikit susu steamed kecil tapi penuh rasa.</p> 
        <p class="menu-card-price">IDR 23K</p> 
        <button type="button" class="btn-order" data-item="Picolo Latte" data-price="23000">Tambahkan</button> 
      </div> 
      
      <div class="menu-card"> <img src="{{ asset('img/affogato.jpg') }}" alt="Affogato" class="menu-card-img" /> 
       <h3 class="menu-card-title">- Affogato -</h3> 
       <p class="menu-card-desc">Perpaduan hangat espresso dan lembutnya es krim vanila dalam satu sajian manis.</p> 
       <p class="menu-card-price">IDR 32K</p> 
       <button type="button" class="btn-order" data-item="Affogato" data-price="32000">Tambahkan</button> 
      </div> 
    
      <div class="menu-card"> <img src="{{ asset('img/oreo latte.jpg') }}" alt="Oreo latte" class="menu-card-img" /> 
       <h3 class="menu-card-title">- Oreo latte -</h3> 
       <p class="menu-card-desc">Perpaduan lembut kopi dan manisnya Oreo dalam satu rasa creamy.</p> 
       <p class="menu-card-price">IDR 27K</p> 
       <button type="button" class="btn-order" data-item="Oreo Latte" data-price="27000">Tambahkan</button> 
      </div> 
  
      <div class="menu-card"> <img src="{{ asset('img/biscoff frappe.jpg') }}" alt="Biscoff Frappe" class="menu-card-img" /> 
  <h3 class="menu-card-title">- Biscoff Frappe -</h3> 
  <p class="menu-card-desc">Campuran kopi dingin dan biskuit Biscoff yang creamy dan karamel manis.</p> 
  <p class="menu-card-price">IDR 32K</p> 
  <button type="button" class="btn-order" data-item="Biscoff Frappe" data-price="32000">Tambahkan</button> 
</div> 

<div class="menu-card"> <img src="{{ asset('img/pistachio latte.jpg') }}" alt="Pistachio latte" class="menu-card-img" /> 
<h3 class="menu-card-title">- Pistachio latte -</h3> 
<p class="menu-card-desc">Paduan lembut kopi dan gurih manis kacang pistachio yang menenangkan.</p> 
<p class="menu-card-price">IDR 28K</p> 
<button type="button" class="btn-order" data-item="Pistachio Latte" data-price="28000">Tambahkan</button> 
</div>

        </div>
      </div>

      <div class="order-form-container order-checkout-box">
        <h3>Keranjang Pesananmu</h3>
        <div id="cart-summary" style="margin-bottom: 1.5rem; padding-bottom: 1rem; border-bottom: 1px solid #333;">
          <p style="color: #ccc">Keranjang kosong.</p>
        </div>

        <form action="{{ route('order.submit') }}" method="POST" id="checkout-form">
          @csrf
          <div class="input-group">
            <label for="table-number">Nomor Meja</label>
            <input type="text" id="table-number" name="table_number" placeholder="Contoh: Meja 5" required />
          </div>
          <div class="input-group">
            <label for="order-name">Nama Pemesan</label>
            <input type="text" id="order-name" name="customer_name" placeholder="Nama Anda" required />
          </div>
          <h3 id="total-price-display" style="text-align: left; margin-top: 2rem">Total: <span id="total-price" style="color: var(--primary)">IDR 0</span></h3>
          <button type="submit" class="btn" style="margin-top: 1.5rem">Cetak ID Pesanan & Bayar di Kasir</button>
        </form>
      </div>
    </div>
  </section>

<script>
  const cart = {};
  let total = 0;
  const menuData = {
    'Espresso': 25000, 'Americano': 20000, 'Cappuccino': 27000, 'Macchiato': 27000,
    'Matcha Latte': 30000, 'Picolo Latte': 23000, 'Affogato': 32000,
    'Oreo Latte': 27000, 'Biscoff Frappe': 32000, 'Pistachio Latte': 28000
  };

  const updateCart = () => {
    const summary = document.getElementById("cart-summary");
    const totalDisplay = document.getElementById("total-price");
    let currentTotal = 0;
    let html = '<ul style="list-style: none; padding: 0;">';

    for (const item in cart) {
      if (cart[item] > 0) {
        const price = menuData[item] || 0;
        const subtotal = cart[item] * price;
        currentTotal += subtotal;
        html += `<li data-item-name="${item}">
          <span>${item}</span>
          <div class="item-controls">
            <button onclick="changeQuantity('${item}', -1)" class="qty-btn">-</button>
            <span>${cart[item]}</span>
            <button onclick="changeQuantity('${item}', 1)" class="qty-btn">+</button>
            <span style="min-width:60px;text-align:right;color:#fff;">IDR ${subtotal.toLocaleString("id-ID")}</span>
          </div>
        </li>`;
      }
    }

    html += "</ul>";
    total = currentTotal;

    if (Object.keys(cart).length === 0) {
      summary.innerHTML = '<p style="color: #ccc;">Keranjang kosong.</p>';
    } else {
      summary.innerHTML = html;
      summary.innerHTML += `<button onclick="clearCart()" class="btn-clear" style="width:auto;background:#dc3545;padding:0.3rem 0.6rem;font-size:0.9rem;margin-top:0.5rem;border-radius:0.3rem;">Hapus Semua</button>`;
    }

    totalDisplay.innerText = `IDR ${total.toLocaleString("id-ID")}`;
    checkFormValidity();
  };

  const changeQuantity = (itemName, amount) => {
    cart[itemName] = (cart[itemName] || 0) + amount;
    if (cart[itemName] <= 0) delete cart[itemName];
    updateCart();
  };
  const clearCart = () => { for (const key in cart) delete cart[key]; updateCart(); };

  document.querySelectorAll(".btn-order").forEach(button => {
    button.addEventListener("click", e => {
      changeQuantity(e.target.dataset.item, 1);
    });
  });

  const checkFormValidity = () => {
    const tableInput = document.getElementById("table-number");
    const nameInput = document.getElementById("order-name");
    const checkoutButton = document.querySelector("#checkout-form .btn");
    const cartEmpty = Object.keys(cart).length === 0;
    const dataFilled = tableInput.value.trim() !== '' && nameInput.value.trim() !== '';
    checkoutButton.disabled = cartEmpty || !dataFilled;
    checkoutButton.style.opacity = checkoutButton.disabled ? "0.5" : "1";
  };

  document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("table-number").addEventListener("input", checkFormValidity);
    document.getElementById("order-name").addEventListener("input", checkFormValidity);
    updateCart();
  });

  document.getElementById("checkout-form").addEventListener("submit", async function(e) {
    e.preventDefault();
    if (Object.keys(cart).length === 0) { alert("Keranjang Anda kosong."); return; }

    const itemsArray = Object.keys(cart).map(itemName => ({
      item_name: itemName,
      quantity: cart[itemName],
      unit_price: menuData[itemName],
      subtotal: cart[itemName] * menuData[itemName]
    }));

    const dataToSend = {
      _token: document.querySelector('input[name="_token"]').value,
      customer_name: document.getElementById("order-name").value,
      table_number: document.getElementById("table-number").value,
      items: itemsArray,
      total_amount: total
    };

    try {
      const response = await fetch("{{ route('order.submit') }}", {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        body: JSON.stringify(dataToSend)
      });

      const result = await response.json();

      if (response.ok) {
        alert(`PESANAN DITERIMA!\n\nID Pesanan Anda: CC-${result.order_id}\nTotal: IDR ${dataToSend.total_amount.toLocaleString('id-ID')}\n\nSilakan tunjukkan ID ini untuk pembayaran.`);
        clearCart();
        e.target.reset();
      } else {
        alert('Gagal memproses pesanan: ' + (result.message || 'Error server tidak diketahui.'));
      }

    } catch (error) {
      console.error('Koneksi gagal:', error);
      alert('Koneksi ke server gagal. Pastikan server Anda berjalan.');
    }
  });
</script>
<script src="{{ asset('js/script.js') }}"></script>

@include('layouts.footer')
</body>
</html>
