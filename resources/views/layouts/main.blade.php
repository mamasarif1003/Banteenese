<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap connection -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../../css/custom.css">
</head>

<body>

    <!-- top item -->
    <div class="container">
        <!-- brand logo -->
        <span class="d-flex justify-content-center">
            <div class="row">
                <div class="d-flex align-items-center">
                    <div class="col-sm-4 col-md-4 mt-4">
                        <a href="/">
                            <img src="../../../assets/icon/Icon Funiture.jpeg" alt="Furniture" class="rounded-circle" width="150vw;">
                        </a>
                    </div>
                </div>
            </div>
        </span>

        <!-- navigasi menu -->
        <div class="d-flex justify-content-center">
            <div class="row my-3">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="d-flex justify-content-center">Menu</span>
                    </button>
                    <!-- <a class="navbar-brand" href="#"><img src="assets/icon/Icon Funiture.png" alt="Furniture" width="250vw;"></a> -->

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../about" role="button">
                                    Tentang Kami
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../../kategori/ruang-keluarga">
                                    Ruang Keluarga
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../../kategori/ruang-makan">
                                    Ruang Makan
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../../kategori/ruang-tidur">
                                    Ruang Tidur
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../../kategori/renovasi">
                                    Renovasi
                                </a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="../../../../../kategori/dekorasi">
                                    Dekorasi
                                </a>
                            </li>

                            @guest
                            <li class="nav-item dropdown active">
                                <a class="nav-link d-none d-lg-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../../../assets/icon/account_cog_icon_137995.svg" width="20vw" alt="">
                                </a>
                                <a class="nav-link d-lg-none d-md-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Akun
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="../../../login">Masuk</a>
                                    <a class="dropdown-item" href="../../../register">Daftar</a>
                                </div>
                            </li>
                            @else

                            <li class="nav-item dropdown active">
                                <a class="nav-link d-none d-lg-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../../../assets/icon/account_cog_icon_137995.svg" width="20vw" alt="">
                                </a>
                                <a class="nav-link d-lg-none d-md-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Akun
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">{{ Auth::user()->name }}</a>
                                    <a class="dropdown-item" href="../../../account">Akun</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link d-none d-lg-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="../../../assets/icon/353439-basket-buy-cart-ecommerce-online-purse-shop-shopping_107515.svg" width="20vw" alt="">
                                </a>
                                <a class="nav-link d-lg-none d-md-block" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Lainnya
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="../../../../keranjang">Keranjang</a>
                                    <a class="dropdown-item" href="../../../../wishlist">Wishlist</a>
                                </div>
                            </li>
                            @endguest

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    @yield('content')

    <div class="container">
        <!-- content project -->
        <div class="row">
            <div class="col-md-4 my-3">
                <a class="nav-link" href="../../../../../kategori/komersial">
                    <div class="contentcrd">
                        <img class="card-img-top" src="../../../assets/photo/pexels-vicky-tran-2317542.jpg" alt="Card image cap">
                        <div class="centered">
                            <h6 class="h3">Komersial</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 my-3">
                <a class="nav-link" href="../../../../../kategori/perkantoran">
                    <div class="contentcrd">
                        <img class="card-img-top" src="../../../assets/photo/Photo by Carlos Diaz from Pexels.jpg" alt="Card image cap">
                        <div class="centered">
                            <h6 class="h3">Perkantoran</h6>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 my-3">
                <a class="nav-link" href="../../../../../kategori/perumahan">
                    <div class="contentcrd">
                        <img class="card-img-top" src="../../../assets/photo/Photo by Hormel from Pexels.jpg" alt="Card image cap">
                        <div class="centered">
                            <h6 class="h3">Perumahan</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row">
            <div class="col my-1">
                <h5 class="card-title nav-link mb-2" style="color: #6E6E6E;font-weight: 700;size: 1rem;">Links</h5>
                <a class="nav-link my-n1" href="../../../../../about" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Tentang</a>
                <a class="nav-link my-n3" href="../../../../../kategori/ruang-keluarga" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Ruang Keluarga</a>
                <a class="nav-link my-n3" href="../../../../../kategori/ruang-makan" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Ruang Makan</a>
                <a class="nav-link my-n3" href="../../../../../kategori/ruang-tidur" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Ruang Tidur</a>
                <a class="nav-link my-n3" href="../../../../../kategori/dekorasi" style="color: #6E6E6E;font-weight: 600;size: 1rem;">Dekorasi</a>
            </div>
            <div class="col my-1">
                <h5 class="card-title nav-link mb-2" style="color: #6E6E6E;font-weight: 700;size: 1rem;">Hubungi Kami</h5>
                <a class="nav-link my-n3" href="#" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/fb_icon-icons.com_65434.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    furniture
                </a>
                <a class="nav-link my-n3" href="#" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/instagram_icon-icons.com_65435.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    @furniture_
                </a>
                <a class="nav-link my-n3" href="#" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/whatsapp-logo_icon-icons.com_57054.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    0822 - 2323 - 4545
                </a>
                <a class="nav-link my-n3" href="#" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/fb_icon-icons.com_65434.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    0822 - 2323 - 89898
                </a>
            </div>
            <div class="col my-1">
                <h5 class="card-title nav-link mb-2" style="color: #6E6E6E;font-weight: 700;size: 1rem;">Showroom Location</h5>
                <a class="nav-link my-n3" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/ecommerce_home_market_mart_shop_shopping_store_icon_123207.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    Jalan Panglima Batur, Banjarbaru
                </a>
                <a class="nav-link my-n3" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/ecommerce_home_market_mart_shop_shopping_store_icon_123207.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    Jalan Sadam Husain
                </a>
                <a class="nav-link my-n3" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/ecommerce_home_market_mart_shop_shopping_store_icon_123207.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    Jalan Barjad, Panglima Batur
                </a>
                <a class="nav-link my-n3" style="color: #6E6E6E;font-weight: 600;size: 1rem;">
                    <img src="../../../../../assets/icon/ecommerce_home_market_mart_shop_shopping_store_icon_123207.svg" alt="" width="20vw;" style="fill: #6E6E6E;">
                    Jalan Cindau Alus, Banjarbaru
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @yield('js')

</body>

</html>
