@extends('layouts.main')

@section('content')

<head>
    <title>Bantenese Furniture : Cara Membayar</title>
    <link rel="stylesheet" href="../../../css/custom.css">
</head>

<div class="imagebg2">
    <div class="container p-5 m5">
        <nav aria-label="breadcrumb">
            <ol class="transparen breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="../../../../account">Akun</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cara Membayar</li>
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
                                <a href="../../../../../history" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Riwayat Pemesanan</small></a>
                                <a href="../../../../../payment" class="d-flex justify-content-center list-group-item list-group-item-action actived"><small>Cara Pembayaran</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="shopping-cart">
                    <div class="transparen card" style="">
                        <div class="card-header">
                            Petunjuk Pembayaran
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="h6">Cara Pembayaran</h6>
                                    <div class="pembayaran">
                                        <ol>
                                            <li>Checkout Pembayaran</li>
                                            <li>
                                                <a class="text-decoration-none" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="color: #6E6E6E;">
                                                    Transfer Sesuai Rekening Berikut
                                                </a>
                                            </li>
                                            <div class="collapse" id="collapseExample">
                                                <div class="transparen rounded-lg card card-body col-lg-12">
                                                    <p style="color: #6E6E6E;" class="h6">BRI : 1234567890102</p>
                                                    <p style="color: #6E6E6E;" class="h6">BNI : 1234567890102</p>
                                                    <p style="color: #6E6E6E;" class="h6">BNI Syariah : 1234567890102</p>
                                                    <p style="color: #6E6E6E;" class="h6">BCA : 1234567890102</p>
                                                    <p style="color: #6E6E6E;" class="h6">MANDIRI : 1234567890102</p>
                                                    <p style="color: #6E6E6E;" class="h6">Lainnya : Silakan Menghubungi via WhatsApp</p>
                                                </div>
                                            </div>
                                            <li>Jangan Lupa Simpan Bukti Transfer</li>
                                            <li>Sertakan Kode Unik Pada Pesanan Saat Konfirmasi Pembayaran</li>
                                            <li>
                                                <a class="text-decoration-none" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample" style="color: #6E6E6E;">
                                                    Konfirmasi Pembayaran Menyertakan Bukti Pembayaran
                                                </a>
                                            </li>
                                            <div class="collapse" id="collapseExample2">
                                                <div class="transparen rounded-lg card card-body col-lg-10">
                                                    <p style="color: #6E6E6E;" class="h6">Whatsapp : 0853 - 1234 - 5678</p>
                                                </div>
                                            </div>
                                            <li>Status Akan Berubah Setelah Berhasil Melakukan Konfirmasi Pembayaran</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
