@extends('layouts.main')

@section('content')

<head>
    <title>Bantenese Furniture : Keranjang</title>
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
                                    <a href="../../../../../wishlist" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Wishlist</small></a>
                                    <a href="../../../../../keranjang" class="d-flex justify-content-center list-group-item list-group-item-action actived"><small>Keranjang</small></a>
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

                            @if(empty($address))
                            <div class="alert alert-danger" role="alert">
                                Anda belum menambahkan alamat. <a href="../../address/create">Tambah Alamat</a>
                            </div>
                            @endif

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
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Warna</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td colspan="7" class="text-center">Keranjang Anda masih Kosong</td>
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
