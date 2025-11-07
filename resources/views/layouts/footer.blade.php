<footer id="footer">
    <div class="footer-content">
        <div class="footer-logo">
            <a href="{{ route('home') }}">Capstone <span>Coffee.</span></a>
            <p>"Your Deadline's Best Friend"</p>
        </div>

        <div class="footer-links">
            <h3>Navigasi Cepat</h3>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('home') }}#about">Tentang Kami</a></li>
                <li><a href="{{ route('order') }}">Menu & Order</a></li>
                <li><a href="{{ route('book') }}">Reservasi Meja</a></li>
            </ul>
        </div>

        <div class="footer-contact">
            <h3>Hubungi Kami</h3>
            <p>Jl. Perintis Kemerdekaan I No.33, RT.007/RW.003, Babakan, Cikokol, Kec. Tangerang, Kota Tangerang, Banten 15118</p>
            <p>+62 85814565021</p>
            <p>Email: info@capstonecoffee.com</p>
        </div>

        <div class="footer-social">
            <h3>Ikuti Kami</h3>
            <a href="#" target="_blank" title="Instagram"><i data-feather="instagram"></i></a>
            <a href="#" target="_blank" title="Twitter"><i data-feather="twitter"></i></a>
            <a href="#" target="_blank" title="Facebook"><i data-feather="facebook"></i></a>
        </div>
    </div>

    <div class="footer-bottom">
        <p>
            &copy; {{ date('Y') }} Capstone Coffee. All Rights Reserved. | Crafted for
            Excellence
        </p>
    </div>
</footer>