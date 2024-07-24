<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,500&display=swap" rel="stylesheet">
        <link href="{{ asset('/') }}assets/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Shortcut Icon -->
        <link rel="shortcut icon" href="{{ asset('/') }}assets/img/logo.jpg">
        <style>
            .responsive-img {
                display: block;
                margin-left: auto;
                margin-right: auto;
                max-width: 50%;
                height: auto;
            }
        </style>
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
            @foreach ($dataArticle as $article)
            <div class="row" style="padding-top: 100px;">
                <div class="col-lg-12">
                    @if( in_array(pathinfo($article->image, PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg','PNG', 'JPG', 'JPEG']))
                        <img src="{{ asset('/assets/img/article') }}/{{$article->image}}" class="card-img-top responsive-img" alt="..." 
                        style="
                        max-height: 400px;
                        width: 100%;">
                    @else
                    <div>GADA GAMBAR</div>
                        <img src="https://www.freeiconspng.com/uploads/file-txt-icon--icon-search-engine--iconfinder-14.png"
                        class="card-img-top" alt="..." 
                        style="
                        max-height: 400px;
                        width: 100%;">
                    @endif
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 mt-2 mx-xl-auto">
                    <div class="card-body">
                        <div class="card-text-detail my-2" style="font-size: 14px; margin: 0 auto; color: rgb(80, 82, 82);">
                            <i class="fa fa-clock-o"></i>&nbsp; {{ $article->created_at->format('d/m/Y')  }}
                        </div>
                        <h2 class="card-text">{{$article->article_title}}</h2>
                        <p class="card-text-detail" style="margin: 0 auto; color: rgb(80, 82, 82);">
                            {!! $article->description !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</main>

<!-- Footer -->
@include('landingpage.components.footer')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    </body>
</html>
