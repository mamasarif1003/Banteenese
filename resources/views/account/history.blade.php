@extends('layouts.main')

@section('content')


<head>
    <title>Bantenese Furniture : Riwayat</title>
    <style>
        .url{
            color: black;
        }
        .url:hover{
            color: black;
        }
    </style>
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
                    <div class="transparen card">

                        @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                        </div>
                        @endif

                        <div class="card-header" style="color: #6E6E6E;">
                            Riwayat Pemesanan
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr class="warnatabel">
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Pembayaran</th>
                                        <th scope="col">Total Tagihan</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; ?>
                                    @forelse($pesanan2 as $p)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td> {{ $p->code }} </td>
                                        @if($p->status == 1)
                                        <td> Belum Dibayar </td>
                                        @endif
                                        @if($p->status == 2)
                                        <td> Proses Pengiriman </td>
                                        @endif
                                        @if($p->status == 3)
                                        <td> Selesai </td>
                                        @endif
                                        <td> {{ $p->pembayaran }} </td>
                                        <td> Rp {{ number_format($p->total_tagihan) }} </td>
                                        <td>
                                            <a href="../../../order-detail/{{ $p->id }}" class="btn btn-info" title="Detail"><i class="fas fa-info"></i></a>
                                            @if($p->status == 1)
                                            <a href="../../../order-cancel/{{ $p->id }}" class="btn btn-danger" title="Batalkan"><i class="fas fa-trash-alt"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <td colspan="6">Anda belum memiliki pesanan apapun</td>
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

@endsection
