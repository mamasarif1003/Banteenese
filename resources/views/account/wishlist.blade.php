@extends('layouts.main')

@section('content')

<head>
    <title>Bantenese Furniture : Wishlist</title>
    <style>
        .url{
            color: black;
        }
        .url:hover{
            color: black;
        }
    </style>
</head>

<body>
    <div class="imagebg2">
        <div class="container p-5 m5">
            <nav aria-label="breadcrumb" class="mb-n3">
                <ol class="transparen breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="../../../../account">Akun</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Whistlist</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-3">
                    <div class="card shopping-cart">
                        <div class="card-body">
                            <div class="" id="">
                                <div class="list-group list-group-flush">
                                    <a href="../../../../../account" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Dashboard</small></a>
                                    <a href="../../../../../wishlist" class="d-flex justify-content-center list-group-item list-group-item-action actived"><small>Wishlist</small></a>
                                    <a href="../../../../../keranjang" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Keranjang</small></a>
                                    <a href="../../../../../address" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Alamat</small></a>
                                    <a href="../../../../../history" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Riwayat Pemesanan</small></a>
                                    <a href="../../../../../payment" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Cara Pembayaran</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="transparen card shopping-cart">
                        <div class="card-body">

                            @if(session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Gambar</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($wishlist as $w)
                                        <tr>
                                            <td>
                                                <img width="100" src="{{ url('../../produk/'.$w->photo) }}" alt="{{ $w->name }}">
                                            </td>
                                            @foreach($product as $pd)
                                            @if($w->barang_id == $pd->id)
                                            <td>
                                                <a class="url" href="../../../produk/{{ $pd->url }}">{{ $w->name }}</a>
                                            </td>
                                            @endif
                                            @endforeach
                                            <td>Rp {{ number_format($w->price) }}</td>
                                            <td>
                                                <a href="../../wishlist/delete/{{ $w->id }}" class="btn btn-danger" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <td colspan="4" class="text-center">Anda Belum memiliki Wishlist</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
