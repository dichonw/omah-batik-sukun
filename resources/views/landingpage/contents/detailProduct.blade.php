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
                    <div style="padding-top: 100px; margin-bottom: 50px;">
                        <div class="container px-4 px-lg-4">
                            <div class="row gx-4 gx-lg-5 align-items-center">
                                <div class="col-md-6" style="max-height: 700px;"><img class="card-img-top mb-5 mb-md-0" src="../assets/img/product/{{ $product->image }}" alt="..." /></div>
                                <div class="col-md-6">
                                    <div class="small mb-1">Detail Produk</div>
                                    <h1 class="display-5 fw-bolder"> {{ $product->product_name }}</h1>
                                    <div class="fs-5 mb-2">
                                    @if($product->discount > 0)
                                        <span class="text-decoration-line-through">Rp. {{ number_format($product->price) }}</span>
                                        <span>Rp. {{ number_format($product->price - $product->discount) }}</span>
                                    @else
                                        <span>Rp. {{ number_format($product->price) }}</span>
                                    @endif
                                    </div>
                                    <p class="lead">{!! $product->description !!}</p>
                                    <a href="https://api.whatsapp.com/send?phone=6285930221410&text={{ urlencode('Halo, saya berminat untuk membeli ' . $product->product_name . ' Seharga Rp. ' . number_format($product->price-$product->discount)) }}"
                                        target="_blank" style="text-decoration: none">
                                        <h4 class="text text-success mt-3" style="cursor: pointer;"><i
                                                class="fa fa-whatsapp"></i> Hubungi Kami</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Other Product -->
                <div class="row px-4">
                    <h4 style="margin-top:30px; margin-bottom: 30px;">Produk Lain Dari Kami</h4>
                    @foreach ($dataOtherProduct as $otherProduct)
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch mb-3">
                        <div class="card" style="width: 25rem;">
                            <a href="/detail_product/{{ $otherProduct->id }}"
                                style="text-decoration: none; color: inherit;">
                                @if (in_array(pathinfo($otherProduct->image, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG']))
                                    <img src="{{ asset('/assets/img/product') }}/{{ $otherProduct->image }}"
                                        class="card-img-top" alt="..."
                                        style="
                                        max-height: 400px;
                                        width: 100%;">
                                @else
                                    <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png"
                                        class="card-img-top" alt="..."
                                        style="
                                        max-height: 400px;
                                        width: 100%;">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-text"
                                        style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; font-size: 18px;">
                                        {{ $otherProduct->product_name }}</h5>
                                    @if ($otherProduct->discount > 0)
                                        <s><h6 class="text mt-2" style="font-size: 14px; color: rgb(156, 155, 154);">Rp. {{ number_format($otherProduct->price) }}</h6></s>
                                        <h6 class="text mt-2" style="font-size: 16px">Rp. {{ number_format($otherProduct->price - $otherProduct->discount) }}</h6>
                                    @else
                                        <h6 class="text mt-2" style="font-size: 16px">Rp. {{ number_format($otherProduct->price) }}</h6>
                                    @endif
                                    <a href="https://api.whatsapp.com/send?phone=6285930221410&text={{ urlencode('Halo, saya berminat untuk membeli ' . $otherProduct->product_name . ' Seharga Rp. ' . number_format($otherProduct->price-$otherProduct->discount)) }}"
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
