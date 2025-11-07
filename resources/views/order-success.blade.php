<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesanan Berhasil Dibuat! - Capstone Coffee</title>

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

    <style>
        .order-page-padding {
            padding-top: 10rem !important;
            scroll-margin-top: 8rem;
            min-height: 100vh;
        }

        .confirmation-box {
            background-color: #1a1a1a;
            padding: 2.5rem;
            border-radius: 10px;
            margin-top: 2rem;
            width: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            text-align: left;
            border: 1px solid #333;
        }

        .confirmation-box h3 {
            border-bottom: 1px solid #333;
            padding-bottom: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .item-list-table {
            width: 100%;
            border-collapse: collapse;
            color: #ccc;
            margin-top: 1.5rem;
            font-size: 1rem;
        }

        .item-list-table th,
        .item-list-table td {
            padding: 0.6rem 0;
            text-align: left;
        }

        .item-list-table th {
            color: var(--primary);
            font-weight: 700;
            border-bottom: 1px solid #555;
        }

        .total-row {
            font-size: 1.3rem;
            font-weight: bold;
            color: #fff;
            border-top: 2px solid var(--primary);
        }

        .order-id-display {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            background-color: var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 5px;
            display: inline-block;
            margin: 1.5rem 0;
        }
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
            <a href="{{ route('order') }}">Pesan Sekarang</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="hamburger-menu"><i class="fas fa-bars"></i></a>
        </div>
    </nav>
    <section class="book order-page-padding" style="text-align: center;">
        <div class="book-container" style="flex-direction: column; align-items: center; max-width: 700px; margin: auto;">

            <h2 style="color: var(--primary); font-size: 2.5rem;">🎉 Pesanan Berhasil Diterima!</h2>
            <p style="font-size: 1.1rem; color: #ccc;">
                Mohon tunjukkan informasi di bawah ini kepada kasir untuk pembayaran dan konfirmasi pesanan Anda.
            </p>

            <div class="confirmation-box">

                <h3 style="color: var(--primary);">Data Pemesanan</h3>

                <p style="font-size: 1rem; margin-bottom: 0.5rem;">
                    Nama Pemesan: <span style="font-weight: bold; color: #fff;">{{ $customerName }}</span>
                </p>
                <p style="font-size: 1rem; margin-bottom: 1.5rem;">
                    Nomor Meja: <span style="font-weight: bold; color: #fff;">{{ $tableNumber }}</span>
                </p>

                <p style="font-size: 1rem; color: #ccc; margin: 0;">ID Pesanan Anda (Tunjukkan Ini!):</p>
                <span class="order-id-display">CC-{{ $orderId }}</span>

                <h3 style="color: var(--primary); margin-top: 2rem;">Daftar Menu Dipesan</h3>

                <table class="item-list-table">
                    <thead>
                        <tr>
                            <th style="width: 50%;">Menu</th>
                            <th style="width: 15%; text-align: center;">Qty</th>
                            <th style="width: 35%; text-align: right;">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->item_name }}</td>
                            <td style="text-align: center;">{{ $item->quantity }}x</td>
                            <td style="text-align: right;">IDR {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="total-row">
                            <td colspan="2" style="padding-top: 1rem;">Total Pembayaran Akhir</td>
                            <td style="text-align: right; padding-top: 1rem; color: var(--primary);">
                                IDR {{ number_format($totalAmount, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <a href="{{ route('home') }}" class="btn" style="margin-top: 3rem; background-color: #4a5568;">Selesai & Kembali ke Home</a>
        </div>
    </section>

    <script>
        feather.replace();
    </script>

    @include('layouts.footer')
</body>

</html>