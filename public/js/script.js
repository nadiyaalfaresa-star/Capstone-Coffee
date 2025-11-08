
(() => {

  const navbarNav = document.querySelector(".navbar-nav");
  const hamburger = document.querySelector("#hamburger-menu");
  if (hamburger && navbarNav) {
    hamburger.addEventListener("click", (e) => { e.preventDefault(); navbarNav.classList.toggle("active"); });
    document.addEventListener("click", (e) => {
      if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) navbarNav.classList.remove("active");
    });
  }


  let cart = {};
  let total = 0;

  const menuData = {
    'Espresso': 25000, 'Americano': 20000, 'Cappuccino': 27000,
    'Macchiato': 27000, 'Matcha Latte': 30000, 'Picolo Latte': 23000,
    'Affogato': 32000, 'Oreo Latte': 27000, 'Biscoff Frappe': 32000,
    'Pistachio Latte': 28000
  };

  const formatRupiah = (value) => `IDR ${value.toLocaleString('id-ID')}`;

  const checkFormValidity = () => {
    const tableInput = document.getElementById("table-number");
    const nameInput = document.getElementById("order-name");
    const checkoutButton = document.querySelector("#checkout-form .btn");
    const cartEmpty = Object.keys(cart).length === 0;
    const dataFilled = tableInput?.value.trim() !== '' && nameInput?.value.trim() !== '';
    if (checkoutButton) {
      checkoutButton.disabled = cartEmpty || !dataFilled;
      checkoutButton.style.opacity = checkoutButton.disabled ? "0.5" : "1";
    }
  };

  const updateCart = () => {
    const summary = document.getElementById("cart-summary");
    const totalDisplay = document.getElementById("total-price");
    let currentTotal = 0;
    let itemCount = 0;
    let html = '<ul style="list-style:none; padding:0; margin:0;">';

    for (const item in cart) {
      if (cart[item] > 0) {
        const price = menuData[item] || 0;
        const subtotal = cart[item] * price;
        currentTotal += subtotal;
        itemCount += cart[item];
        html += `
          <li data-item-name="${item}" style="margin-bottom:.5rem;">
            <span>${item}</span>
            <div class="item-controls" style="display:flex; gap:.5rem; align-items:center;">
              <button type="button" class="qty-btn" onclick="changeQuantity('${item}', -1)">-</button>
              <span>${cart[item]}</span>
              <button type="button" class="qty-btn" onclick="changeQuantity('${item}', 1)">+</button>
              <span style="min-width:80px; text-align:right; color:#fff;">${formatRupiah(subtotal)}</span>
            </div>
          </li>`;
      }
    }
    html += "</ul>";
    total = currentTotal;

    if (itemCount === 0) {
      summary.innerHTML = '<p style="color:#ccc;">Keranjang kosong.</p>';
    } else {
      summary.innerHTML = html + `<button type="button" onclick="clearCart()" class="btn-clear" style="background:#dc3545; padding:.3rem .6rem; margin-top:.5rem;">Hapus Semua</button>`;
    }

    totalDisplay.innerText = formatRupiah(total);
    checkFormValidity();
  };

  window.changeQuantity = (itemName, amount) => {
    cart[itemName] = (cart[itemName] || 0) + amount;
    if (cart[itemName] <= 0) delete cart[itemName];
    updateCart();
  };

  window.clearCart = () => { cart = {}; updateCart(); };


  document.addEventListener("DOMContentLoaded", () => {

    document.querySelectorAll(".btn-order").forEach(button => {
      button.addEventListener("click", (e) => {
        const item = e.currentTarget.getAttribute("data-item");
        changeQuantity(item, 1);
      });
    });


    const tableInput = document.getElementById("table-number");
    const nameInput = document.getElementById("order-name");
    if (tableInput) tableInput.addEventListener("input", checkFormValidity);
    if (nameInput) nameInput.addEventListener("input", checkFormValidity);


    const form = document.getElementById("checkout-form");
    if (form) {
      form.addEventListener("submit", async (e) => {
        e.preventDefault();
        if (Object.keys(cart).length === 0) {
          alert("Keranjang Anda kosong. Mohon pilih menu terlebih dahulu.");
          return;
        }


    const itemsArray = Object.entries(cart).map(([item_name, quantity]) => ({ 
        item_name,
        quantity,
        unit_price: menuData[item_name] || 0,
        subtotal: (menuData[item_name] || 0) * quantity
        }))

        const dataToSend = {
          _token: document.querySelector('input[name="_token"]').value,
          customer_name: document.getElementById("order-name").value,
          table_number: document.getElementById("table-number").value,
          items: itemsArray,
          total_amount: total,
        };

 
        console.log('ORDER SEND:', dataToSend);

        try {
          const response = await fetch(window.orderSubmitUrl, {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
              "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
              "X-Requested-With": "XMLHttpRequest",
            },
            body: JSON.stringify(dataToSend),
          });

          const result = await response.json();

          if (response.ok) {
            alert(`✅ PESANAN DITERIMA!\n\nID Pesanan Anda: CC-${result.order_id}\nTotal: ${formatRupiah(dataToSend.total_amount)}\n\nSilakan tunjukkan ID ini untuk pembayaran.`);
            clearCart();
            form.reset();
            checkFormValidity();
            
          } else {
            alert('Gagal memproses pesanan: ' + (result.message || 'Error server tidak diketahui.'));
          }
        } catch (error) {
          console.error('Koneksi gagal:', error);
          alert('Koneksi ke server gagal. Pastikan server Anda berjalan.');
        }
      });
    }

    updateCart();
  });
})();
