<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop eCommerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap2.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/templatemo.css')}}">


    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">

</head>

<body>
    <!-- Header -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h2 align-self-center" href="/">
                MyCart
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-start">
                        <li class="nav-item">
                            <a class="nav-link ms-4=" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-4" href="#product">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ms-4" href="#about">About Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <a href="login" class="mx-2 btn" >Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>



    <!-- Start Banner Hero -->
    {{-- <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol> --}}
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($slider as $s => $sliders)
            <div class="carousel-item {{$s == 0 ? 'active' : '' }}">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="{{ asset('storage/images/sliders/' . $sliders->image) }}" style="height: 30rem;" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                {{-- <h1 class="h1 text-success"><b>Shop</b> eCommerce</h1>
                                <h3 class="h2">Tiny and Perfect eCommerce Template</h3> --}}
                                <p>
                                    {{ $sliders->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>    
    
   
    <!-- End Banner Hero -->

    <!-- Start Featured Product -->
    <section class="bg-light" id="product">
        <div class="container py-5" >
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Featured Product</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        Explicabo cupiditate cum autem quis dolorum totam maxime neque,
                </div>
            </div>
            <div class="row" >
                @foreach ($products as $p)
                <div class="col-12 col-md-4 mb-4 ">
                    <div class="card h-100">
                        <a href="">
                            <img src="{{asset('storage/images/products/' . $p->image)}}" class="card-img" style="height: 21rem;" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-left">{{ $p->name_product}}</li>
                                <li class="text-right">RP. {{number_format($p->price, 0)}}</li>
                            </ul>
                            @foreach ($categories as $item)
                            <a class="h2 text-decoration-none text-dark">{{ $p->category_id == $item->id ? $item->name_category  : ''}}
                            </a>
                            @endforeach
                            <p class="card-text">{{ $p->description}}</p>
                            <a class="btn btn-success btn-lg">Pesan Sekarang !</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Featured Product -->


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container" id="about">
            <div class="row">

                <div class="col-md-6 pt-5">
                    <h2 class="text-success border-bottom pb-3 border-light logo">MyCart Shop</h2>
                    <p class="text-light">MyCart merupakan platform toko online khusus untuk pria yang 
                        menawarkan berbagai produk dengan fokus pada kebutuhan dan gaya hidup pria modern. 
                        Kami menyediakan pengalaman belanja online yang nyaman bagi 
                        para pelanggan kami.</p>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Contact</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <ul class="list-unstyled text-light footer-link-list">
                            <li>
                                <i class="fas fa-map-marker-alt fa-fw"></i>
                                Jalan Mangga Besar III No. 17, Kab. Malang, Jawa Timur, 60256
                            </li>
                            <li>
                                <i class="fa fa-phone fa-fw"></i>
                                <a class="text-decoration-none" href="">0812384312</a>
                            </li>
                            <li>
                                <i class="fa fa-envelope fa-fw"></i>
                                <a class="text-decoration-none" href="">mycart@company.com</a>
                            </li>
                        </ul>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.facebook.com/profile.php?id=100009399030321"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/b_maulanaibrahim/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://github.com/BagasIbrahim"><i class="fab fa-github fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/in/bagas-maulana-ibrahim/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2021 Company Name 
                            | Designed by <a rel="sponsored" href="" target="_blank">Bagas Maulana</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{asset('vendor/bootstrap/javascript/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/javascript/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/javascript/templatemo.js')}}"></script>
    <!-- End Script -->
</body>
</html>