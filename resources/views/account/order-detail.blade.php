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
                    <div class="container">
                        <div class="transparen card">

                            <div class="transparen card">
                                <div class="card-body">
                                    <h3>Pesanan</h3>
                                    <hr>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Kode</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Pembayaran</th>
                                                    <th scope="col">Ongkir</th>
                                                    <th scope="col">Total Harga</th>

                                                    @foreach ($pesanan as $p)
                                                    @if($p->status=='2')
                                                    <th scope="col">Nomor Resi</th>
                                                    @endif
                                                    @endforeach

                                                    @foreach ($pesanan as $p)
                                                    @if($p->status=='3')
                                                    <th scope="col">Nomor Resi</th>
                                                    @endif
                                                    @endforeach

                                                    <th scope="col">Total Tagihan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pesanan as $p)
                                                <tr>
                                                    <th scope="row">{{ $p->code }}</th>
                                                    <td>
                                                        @if($p->status=='1')
                                                        <p>Belum dibayar</p>
                                                        @endif
                                                        @if($p->status=='2')
                                                        <p>Sudah dibayar / Sedang Diproses</p>
                                                        @endif
                                                        @if($p->status=='3')
                                                        <p>Transaksi sudah selesai</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @foreach ($address as $a)
                                                        <h6>{{ $a->first_name }} {{ $a->last_name }}</h6>
                                                        <h6>{{ $a->address }}</h6>
                                                        @foreach ($city as $c)
                                                        @if($a->city_id == $c->city_id)
                                                        <h6>{{ $c->title }}</h6>
                                                        @endif
                                                        @endforeach
                                                        <h6>{{ $a->post_code }}</h6>
                                                        <h6>{{ $a->province->title }}</h6>

                                                        @endforeach
                                                    </td>
                                                    <td>{{ $p->pembayaran }}</td>
                                                    <td>Rp {{ number_format($p->ongkir) }}</td>
                                                    <td>Rp {{ number_format($p->total_harga) }}</td>

                                                    @foreach ($pesanan as $p)
                                                    @if($p->status=='2')
                                                    <td>{{ $p->receipt_number }} <span>(<b>{{ $p->kurir }}</b>)</span></td>
                                                    @endif
                                                    @endforeach

                                                    @foreach ($pesanan as $p)
                                                    @if($p->status=='3')
                                                    <td>{{ $p->receipt_number }} <span>(<b>{{ $p->kurir }}</b>)</span></td>
                                                    @endif
                                                    @endforeach

                                                    <td>Rp {{ number_format($p->total_tagihan) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="transparen card mt-4">
                                <div class="card-body">
                                    <h3>Pesanan Detail</h3>
                                    <hr>
                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">Produk</th>
                                                    <th scope="col">Jumlah Produk</th>
                                                    <th scope="col">Warna</th>
                                                    <th scope="col">Total Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pesanand as $pd)
                                                <tr>
                                                    <th>
                                                        <img src="{{ url('../../produk/'.$pd->photo) }}" alt="{{ $pd->item_name }}" width="80px">
                                                    </th>
                                                    <td>{{ $pd->item_name }}</td>
                                                    <td>{{ $pd->item_total }}</td>
                                                    <td>{{ $pd->color }}</td>
                                                    <td>Rp {{ number_format($pd->jumlah_harga) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            @foreach ($pesanan as $p)
                            <div class="transparen card mt-4 mb-4">
                                <div class="card-body">
                                    <h3>Catatan</h3>
                                    <hr>
                                    <p>{{$p->note}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
