@extends('layouts.main')

@section('content')

<head>
    <title>Bantenese Furniture</title>
    <style>
        .name-link {
            color: black;
        }

        .name-link:hover {
            color: black;
        }

    </style>
</head>


<!-- judul content pertama -->
<div class="container mt-n3 fcontent">
    <div class="d-flex justify-content-center">
        <h6 class="h2">Produk Terbaru</h6>
    </div>
</div>

<div class="container">
    <!-- content pertama -->
    <div class="row">
        @foreach($product as $p)
        <div class="col-md-3">
            <a class="nav-link" href="">
                <div class="contentcrd">
                    <a class="name-link" href="/produk/{{ $p->url }}">
                        <img class="card-img-top" src="{{ url('../../produk/'.$p->pict) }}" alt="{{ $p->name }}">
                    </a>
                    <div class="">
                        <h5 class="card-title mt-3"><a class="name-link" href="/produk/{{ $p->url }}">{{{ $p->name }}}</a></h5>
                        <p class="my-1 card-text a">{{ $p->category }} -
                            @if($p->stock=='1')
                            <span style="color:green">Ada</span>
                            @endif
                            @if($p->stock=='0')
                            <span style="color:red">Kosong</span>
                            @endif
                        </p>
                        <p class="card-text b">Rp {{ number_format($p->price) }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $product->links() }}
    </div>

</div>

<!-- Wellcome / Pengenalan -->
<div class="imagebg my-3">
    <div class="container">
        <h4 class="h2 text-center">Jadikan Rumah Anda Lebih Berseri</h4>
        <h5 class="h5 text-center">Kami Siap Melengkapi Setiap Sudut Ruang Anda</h5>
        <div class="d-flex justify-content-center mt-5">
            <button type="button" class="btn rounded-pill"><a class="nav-link" href="/">Mulai</a></button>
        </div>
    </div>
</div>


@endsection
