@extends('layouts.main')

@section('content')

@foreach($product as $p)

<head>
    <title>Detail {{ $p->name }}</title>
    <style>
        form {
            display: contents;
        }

    </style>
</head>

<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: white !important;">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            @foreach($category as $c)
            @if($p->category == $c->category)
            <li class="breadcrumb-item"><a href="../../../kategori/{{ $c->slug }}">{{ $c->category }}</a></li>
            @endif
            @endforeach
            <li class="breadcrumb-item active" aria-current="page">{{ $p->name }}</li>
        </ol>
    </nav>

    @if(session()->has('habis'))
    <div class="alert alert-warning">
        {{ session()->get('habis') }}
    </div>
    @endif

    @if(session()->has('alamat'))
    <div class="alert alert-warning">
        {{ session()->get('alamat') }} <a href="../../address/create">Tambah Alamat</a>
    </div>
    @endif

    <!-- <h1 class="produkheader h2 ml-3 mb-4 mt-n4">Kursi Berlipat Ganda Yang Nyaman </h1> -->

    <!-- overview produk -->
    <div class="contianer">
        <div class="row">
            <div class="col-md-6 ml-3">
                <center>
                    <img src="{{ url('../../produk/'.$p->pict) }}" class="img-fluid">
                </center>
            </div>
            <div class="col-md-5 takedown ml-3">
                <h1 class="produkheader h4">{{ $p->name }}</h1>
                <h6 class="h5 mt-n2">Harga : Rp {{ number_format($p->price) }}</h6>
                <p id="desc" class="p text-justify">
                    <?php echo $p->description; ?>
                </p>
                <p class="p mt-n2" style="font-weight: 400;">
                    <strong>Berat Barang</strong> : {{ number_format($p->weight) }} gram
                </p>
                <p class="p mt-n2" style="font-weight: 400;">
                    <strong>Stock</strong> :
                    @if($p->stock=='1')
                    <span style="color:green;">Ada</span>
                    @endif
                    @if($p->stock=='0')
                    <span style="color:red;">Kosong</span>
                    @endif
                </p>

                <form method="post" action="/tambahkeranjang/{{ $p->id }}">
                    @csrf

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Variant Warna</label>
                        <div class="col-sm-8">

                            <select class="form-control form-control-sm" name="color">
                                @foreach($color as $c)
                                <option value="{{ $c }}">{{ $c }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Jumlah Pesan</label>
                        <div class="col-sm-8">
                            <input name="item_total" type="number" min="1" maxlength="99" class="form-control" value="1" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" title="Tambahkan ke Keranjang">
                        <img src="../../../assets/icon/353439-basket-buy-cart-ecommerce-online-purse-shop-shopping_107515.svg" width="20vw">
                    </button>
                </form>


                <a class="btn btn-warning" href="/wishlist/{{ $p->url }}" title="Tambahkan ke Wishlist">
                    <img src="../../../assets/icon/seo-social-web-network-internet_132_icon-icons.com_61506.svg" width="20vw" alt="">
                </a>
            </div>
        </div>
    </div>

    <!-- judul content kedua -->
    <div class="container mt-5 fcontent">
        <div class="d-flex justify-content-center">
            <h6 class="h2">Produk Terbaru</h6>
        </div>
    </div>

    <div class="container">
        <!-- content project -->
        <div class="row">
            @foreach($latestp as $l)
            <div class="col-md-3 my-3">
                <a class="nav-link" href="../../../produk/{{ $l->url }}">
                    <div class="contentcrd">
                        <img class="card-img-top" src="{{ url('../../produk/'.$l->pict) }}" alt="{{ $l->name }}">
                        <div class="">
                            <h5 class="card-title">{{ $l->name }}</h5>
                            <p class="my-1 card-text a">{{ $l->category }}</p>
                            <p class="card-text b">Rp {{ number_format($l->price) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endforeach

@endsection
