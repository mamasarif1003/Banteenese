@extends('layouts.main')

@section('content')


<head>
    <title>Bantenese Furniture : Riwayat</title>
</head>

<div class="imagebg2">
    <div class="container p-5 m5">
        <nav aria-label="breadcrumb" class="mb-n3">
            <ol class="transparen breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="../../../../account">Akun</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Pesanan</li>
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
                                <a href="../../../../../keranjang" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Keranjang</small></a>
                                <a href="../../../../../address" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Alamat</small></a>
                                <a href="../../../../../history" class="d-flex justify-content-center list-group-item list-group-item-action actived"><small>Riwayat Pemesanan</small></a>
                                <a href="../../../../../payment" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Cara Pembayaran</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="shopping-cart">
                    <div class="transparen card" style="">
                        <div class="card-header" style="color: #6E6E6E;">
                            Riwayat Pemesanan
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr class="warnatabel">
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Warna</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <td colspan="6">Anda belum memiliki pesanan apapun</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
