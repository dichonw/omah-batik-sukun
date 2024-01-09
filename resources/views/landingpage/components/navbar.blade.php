<header id="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="min-height: 80px;">
        <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}#" style="font-weight: 500;">
            <img src="{{ asset('/') }}assets/img/logo.png" alt="Logo" width="30" class="d-inline-block align-text-top">
            Omah Batik Sukun
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <a class="nav-link active" id="home-link" aria-current="page" href="{{ url('/') }}#">Home</a>
                <a class="nav-link" id="about-link" href="{{ url('/') }}#about">Tentang</a>
                <a class="nav-link" id="product-link" href="{{ url('/') }}#product">Produk</a>
                <a class="nav-link" id="articles-link" href="{{ url('/') }}#articles">Artikel</a>
                <a class="nav-link" id="contact-link" href="{{ url('/') }}#contact">Kontak</a>
                <a class="nav-link" id="login-link" href="{{ url('/admin') }}">Login</a>
            </ul>
          </div>
        </div>
    </nav>
</header>

<script>
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Hapus kelas active dari semua tautan navbar
            navLinks.forEach(link => link.classList.remove('active'));

            // Tambahkan kelas active ke tautan yang diklik
            this.classList.add('active');
        });
    });
</script>
