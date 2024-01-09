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
    <link href="{{ asset('/') }}assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Shortcut Icon -->
    <link rel="shortcut icon" href="{{ asset('/') }}assets/img/logo.jpg">
    <title>Omah Batik Sukun</title>
</head>

<body>
    <!-- Navbar -->
    @include('landingpage.components.navbar')

    <!-- Main -->
    <main id="main">

        <!-- Detail -->
        <section id="about" class="container-fluid">
            <div class="container mb-5" style="padding-top: 30px;">
                @foreach ($dataProduct as $product)
                    <div class="row" style="padding-top: 100px;">
                        <div class="col-lg-6">
                            <img src="../assets/img/product/{{ $product->image }}" class="img-fluid" alt="Produk"
                                style="max-height: 500px;">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0">
                            <div class="card-body">
                                <h2 class="card-text">
                                    {{ $product->product_name }}</h2>
                                <p class="card-text-detail" style="margin: 0 auto; color: rgb(80, 82, 82);">
                                    {{ $product->description }}
                                </p>
                                <h4 class="text mt-2">Rp. {{ number_format($product->price) }}</h4>
                                <a href="https://api.whatsapp.com/send?phone=6285930221410&text={{ urlencode('Halo, saya berminat untuk membeli ' . $product->product_name . ' Seharga Rp. ' . number_format($product->price)) }}"
                                    target="_blank" style="text-decoration: none">
                                    <h4 class="text text-success mt-3" style="cursor: pointer;"><i
                                            class="fa fa-whatsapp"></i> Hubungi Kami</h4>
                                </a>

                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Other Product -->
                <div class="row" style="padding-top: 60px;">
                    <h5 style="margin-bottom: 20px;">PRODUK LAIN DARI KAMI</h5>
                    @foreach ($dataOtherProduct as $otherProduct)
                        <div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-3">
                            <div class="card" style="width: 25rem;">
                                <a href="/detail_product/{{ $otherProduct->id }}"
                                    style="text-decoration: none; color: inherit;">
                                    @if (in_array(pathinfo($otherProduct->image, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG']))
                                        <img src="{{ asset('/assets/img/product') }}/{{ $otherProduct->image }}"
                                            class="card-img-top" alt="..."
                                            style="
                                            object-fit: none; 
                                            object-position: center; 
                                            height: 280px;
                                            width: 100%;">
                                    @else
                                        <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png"
                                            class="card-img-top" alt="..." style="width: 80%;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-text"
                                            style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                                            {{ $otherProduct->product_name }}</h5>
                                        <p class="card-text-detail"
                                            style="margin: 0 auto; font-size: 12px; color: rgb(80, 82, 82);">
                                            {{ Str::limit($otherProduct->description, 50) }}
                                        </p>
                                        <h6 class="text mt-2">Rp. {{ number_format($otherProduct->price) }}</h6>
                                        <a href="https://api.whatsapp.com/send?phone=6285930221410&text={{ urlencode('Halo, saya berminat untuk membeli ' . $otherProduct->product_name . ' Seharga Rp. ' . number_format($otherProduct->price)) }}"
                                            target="_blank" style="text-decoration: none">
                                            <h6 class="text text-success mt-3" style="cursor: pointer;"><i
                                                    class="fa fa-whatsapp"></i> Hubungi Kami</h6>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    @include('landingpage.components.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
</body>

</html>
