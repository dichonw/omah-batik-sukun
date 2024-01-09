<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500&display=swap"
        rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{ asset('/') }}assets/img/logo.png">
    <title>Omah Batik Sukun</title>

    <style>
        .card {
            /* Gaya asal */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Animasi perubahan ukuran dan bayangan */
        }

        .card:hover {
            transform: scale(1.02);
            /* Perbesar elemen saat cursor menyentuh */
            box-shadow: 0 0 15px 0 rgba(53, 53, 53, 0.5);
            /* Tampilkan efek shadow saat cursor menyentuh */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('landingpage.components.navbar')

    <!-- Hero -->
    <section id="hero" class="d-flex align-items-center justify-content-center py-sm-5 py-lg-5 mt-5">
        <div class="container position-relative">
            <h1>Selamat Datang di Omah Batik Sukun</h1>
            <h4>kualitas yang bersaing dan berstandard international, mulai dari coloring, fabric, dan garment quality.
            </h4>
            <a href="#contact"><button class="btn btn-outline-light mt-3">Hubungi Kami</button></a>
        </div>
    </section>

    <!-- Main -->
    <main id="main">

        <!-- About -->
        <section id="about" class="container-fluid">
            <div class="container mb-5" style="padding-top: 30px;">
                <div class="section-title">
                    <h2 class="text-center mt-5 mb-5">TENTANG</h2>
                </div>
                <div class="row" style="padding-top: 30px;">
                    <div class="col-lg-6">
                        <img src="assets/img/TentangBaru.png" class="img-fluid" alt="Omah Batik Sukun" width="100%">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <h3>Omah Batik Sukun</h3>
                        <div style='text-align:justify;'>
                            <p>
                                Omah Batik adalah sebuah UMKM yang berlokasi di Kota Malang dan mengusung misi untuk
                                melestarikan warisan budaya Indonesia melalui seni tradisional batik. Dengan keahlian
                                dan dedikasi yang tinggi, Omah Batik menggabungkan sentuhan modern dengan desain
                                tradisional yang elegan.
                            </p>
                            <p>
                                Setiap produk batik yang dihasilkan oleh Omah Batik merupakan karya seni yang diolah
                                dengan penuh perhatian terhadap detail. Mengambil inspirasi dari keanekaragaman budaya
                                Indonesia, setiap motif batik diciptakan dengan penuh cinta dan inovasi. Mulai
                                dari motif klasik hingga desain yang lebih kontemporer, Omah Batik menghadirkan berbagai
                                pilihan untuk memenuhi selera para pelanggan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Product -->
        <section id="product" class="container-fluid bg-body-secondary pt-1 pb-1">
            <div class="container mb-5" style="padding-top: 30px;">
                <div class="section-title">
                    <h2 class="text-center  mt-5 mb-5">PILIHAN PRODUK TERBAIK KAMI</h2>
                </div>
                <div class="row" style="padding-top: 30px;">

                    {{-- Product Content --}}
                    @foreach ($dataProduct as $product)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-3">
                            <div class="card" style="width: 25rem;">
                                <a href="/detail_product/{{ $product->id }}"
                                    style="text-decoration: none; color: inherit;">
                                    @if (in_array(pathinfo($product->image, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG']))
                                        <img src="{{ asset('/assets/img/product') }}/{{ $product->image }}"
                                            class="card-img-top" alt="..."
                                            style="
                                            object-fit: none;
                                            object-position: center;
                                            height: 280px;
                                            width: 100%;">
                                    @else
                                        <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png"
                                            class="card-img-top" alt="..."
                                            style="
                                            object-fit: none;
                                            object-position: center;
                                            height: 280px;
                                            width: 100%;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-text"
                                            style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                            {{ $product->product_name }}</h5>
                                        <p class="card-text-detail"
                                            style="margin: 0 auto; font-size: 12px; color: rgb(80, 82, 82);">
                                            {{ Str::limit($product->description, 50) }}
                                        </p>
                                        <h6 class="text mt-2">Rp. {{ number_format($product->price) }}</h6>
                                        <a href="https://api.whatsapp.com/send?phone=6285930221410&text={{ urlencode('Halo, saya berminat untuk membeli ' . $product->product_name . ' Seharga Rp. ' . number_format($product->price)) }}"
                                            target="_blank" style="text-decoration: none">
                                            <h6 class="text text-success mt-3" style="cursor: pointer;"><i
                                                    class="fa fa-whatsapp"></i> Hubungi Kami</h6>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-end">
                        {{ $dataProduct->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </section>


        <!-- Services -->
        <section id="services" class="container-fluid">
            <div class="container mb-5" mt-5 mb-5>
                <div class="section-title">
                    <h2 class="text-center mt-5 mb-5">KEUNGGULAN OMAH BATIK SUKUN</h2>
                    <p class="text-center pb-3" style="font-size: 14px;">Setiap produk batik yang dihasilkan oleh Omah
                        Batik merupakan karya seni yang diolah dengan penuh perhatian terhadap detail. Mengambil
                        inspirasi dari keanekaragaman budaya Indonesia.</p>
                </div>
                <div class="row" mt-5 mb-5>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0 mb-3">
                        <div class="card text-center"
                            style="box-shadow: 0px 0 35px 0 rgba(0, 0, 0, 0.08); border: none; padding: 70px 20px 80px 20px;">
                            <i class="fa fa-thumbs-up fa-3x mt-3"></i>
                            <div class="card-body">
                                <h5 class="card-text">Kualitas</h5>
                                <p class="card-text-detail"
                                    style="margin: 0 auto; font-size: 12px; font-style: italic; color: rgb(80, 82, 82);">
                                    Dengan dedikasi pada seni batik, setiap karya dihasilkan dengan perhatian terhadap
                                    detail, menggunakan teknik pewarnaan alami, dan bahan-bahan berkualitas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0 mb-3">
                        <div class="card text-center">
                            <i class="fa fa-heart fa-3x mt-3"></i>
                            <div class="card-body">
                                <h5 class="card-text">100% handmade</h5>
                                <p class="card-text-detail"
                                    style="margin: 0 auto; font-size: 12px; font-style: italic; color: rgb(80, 82, 82);">
                                    Dari desain hingga penyelesaian, setiap langkah dilakukan dengan teliti oleh
                                    pengrajin berbakat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0 mb-3">
                        <div class="card text-center">
                            <i class="fa fa-truck fa-3x mt-3"></i>
                            <div class="card-body">
                                <h5 class="card-text">Pengiriman ke seluruh Indonesia</h5>
                                <p class="card-text-detail"
                                    style="margin: 0 auto; font-size: 12px; font-style: italic; color: rgb(80, 82, 82);">
                                    Dengan layanan pengiriman yang handal, setiap pesanan Anda akan tiba dengan aman dan
                                    tepat waktu.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles -->
        <section id="articles" class="container-fluid bg-body-secondary pt-1 pb-1">
            <div class="container mb-5" style="padding-top: 30px;">
                <div class="section-title">
                    <h2 class="text-center mt-5 mb-5">Artikel</h2>
                    <p class="text-center pb-3" style="font-size: 14px;">Beberapa kegiatan dari kami</p>
                </div>
                <div class="row" style="padding-top: 30px;">
                    @foreach ($dataArticle as $article)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-3">
                            <a href="/detail_article/{{ $article->id }}"
                                style="text-decoration: none; color: inherit;">
                                <div class="card" style="width: 23rem;">
                                    @if ($article->optional_link != null)
                                        <iframe src="{{ $article->optional_link }}" frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen
                                            style="
                                                object-fit: none;
                                                object-position: center;
                                                height: 280px;
                                                width: 100%;"></iframe>
                                    @else
                                        @if (in_array(pathinfo($article->image, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG']))
                                            <img src="{{ asset('/assets/img/article') }}/{{ $article->image }}"
                                                class="card-img-top" alt="..."
                                                style="
                                                    object-fit: none;
                                                    object-position: center;
                                                    height: 280px;
                                                    width: 100%;">
                                        @else
                                            <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png"
                                                class="card-img-top" alt="..."
                                                style="
                                                    object-fit: none;
                                                    object-position: center;
                                                    height: 280px;
                                                    width: 100%;">
                                        @endif
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-text">{{ $article->article_title }}</h5>
                                        <p class="card-text-detail mb-1"
                                            style="margin: 0 auto; font-size: 12px; color: rgb(80, 82, 82);">
                                            <i class="fa fa-clock-o"></i>&nbsp;
                                            {{ $article->created_at->format('d/m/Y') }}
                                        </p>
                                        <p class="card-text-detail"
                                            style="margin: 0 auto; font-size: 12px; color: rgb(80, 82, 82);">
                                            {{ Str::limit($article->description, 50) }}
                                        </p>
                                        <h6 class="text mt-2" style="font-style: italic;color: rgb(80, 82, 82);">Read
                                            More ></h6>
                                        {{-- @if ($article->updated_at != $article->created_at)
                    <div class="form-text text-secondary text-end mb-2">
                    *Article has been edited at {{$article->updated_at->format('d/m/Y')}}
                    </div>
                @endif --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-end">
                        {{ $dataArticle->links('pagination::bootstrap-4') }}
                    </div>

                </div>
            </div>
        </section>

        <!-- Contact -->
        <section id="contact" class="container-fluid pt-1 pb-1">
            <div class="container mb-5" mt-5 mb-5>
                <div class="section-title">
                    <h2 class="text-center mt-4 mb-4">KONTAK</h2>
                    <p class="text-center pb-3" style="font-size: 14px;">Silakan gunakan formulir di bawah ini untuk
                        segera menghubungi kami</p>
                </div>
                <div class="row" mt-5 mb-5>
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="fa fa-map-marker fa-3x"></i>
                                    <h3>Alamat</h3>
                                    <p>Kampung Terapi Hijau RW 03 Kelurahan Sukun, Kota Malang.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box mt-4">
                                    <i class="fa fa-envelope fa-2x"></i>
                                    <h3>Instagram</h3>
                                    <p><a>@omahbatiksukun</span></a></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box mt-4">
                                    <i class="fa fa-whatsapp fa-2x"></i>
                                    <h3>Whatsapp</h3>
                                    <p><a>082331257347</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </main>


    <!-- Footer -->
    @include('landingpage.components.footer')

    <!-- Modal Detail Product -->
    <div class="modal fade " id="detailModal" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Produk</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="img-product">
                        <img src="assets/img/product/2.jpg" class="img-fluid" alt="Produk"
                            style="max-height: 500px; padding-bottom: 16px;">
                    </div>
                    <div class="detail-product">
                        <div class="card-body">
                            <h5 class="card-text">Batik Motif Batik Topeng</h5>
                            <p class="card-text-detail"
                                style="margin: 0 auto; font-size: 14px; color: rgb(80, 82, 82);">Filosofi motif dari
                                buah dan daun sukun ini terinspirasi dari masyarakat lokal yang menyebut “Sukun” sebagai
                                “Pohon Kehidupan” karena tanamana ini dapat memenuhi dan menyediakan begitu banyak
                                kebutuhan untuk seseorang.
                                Buah dan daun mudanya dapat dimakan, batangnya yang ringan bisa digunakan untuk
                                membangun rumah dan kano tradisional, dan kulit kayunya digunakan untuk membuat pakaian.
                                Beberapa ahli tanaman bahkan menyatakan bahwa “Sukun” adalah buah super untuk masa
                                depan, yang punya potensi jadi solusi masalah kelaparan dunia.
                            </p>
                            <h5 class="text mt-2">Rp 100.000</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success"><i class="fa fa-whatsapp"></i> Hubungi
                        Kami</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>

</html>
