@extends('layouts.main')

@section('content')

<head>
    <title>Bantenese Furniture : Keranjang</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
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
                                        @forelse ($keranjang as $k)
                                        <tr>
                                            <td>
                                                <img width="70" src="{{ url('../../produk/'.$k->photo) }}" alt="{{ $k->name }}">
                                            </td>
                                            <td>
                                                {{ $k->item_name }}
                                            </td>
                                            <td>{{ $k->item_total }}</td>
                                            <td>{{ $k->color }}</td>
                                            <td>Rp {{ number_format($k->price) }}</td>
                                            <td>Rp {{ number_format($k->jumlah_harga) }}</td>
                                            <td>
                                                <a href="../../hapuskeranjang/{{ $k->id }}" class="btn btn-danger" title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        @empty
                                        <td colspan="7" class="text-center">Keranjang Anda masih Kosong</td>
                                        @endforelse
                                        
                                        <td colspan="5"><b>Jumlah Harga</b></td>
                                        <td><b>Rp {{ number_format($pesanan->total_harga) }}</b></td>
                                    </tbody>
                                </table>
                            </div>

                            <form action="/cekongkir" method="post">
                                @csrf

                                <!--KOTA ASAL & TUJUAN-->
                                <!--501 = yogyakarta-->
                                <input type="hidden" name="city_origin" value="501">
                                <input type="hidden" name="city_destination" value="{{ $address->city_id }}">

                                <div class="transparen card mt-4">
                                    <!--KURIR-->
                                    <div class="card-body">
                                        <h3>KURIR</h3>
                                        <hr>
                                        <div class="form-group">
                                            <select class="form-control kurir" name="kurir">
                                                <option value="jne">JNE</option>
                                                <option value="pos">POS</option>
                                                <option value="tiki">TIKI</option>
                                            </select>
                                        </div>
                                        <!--BERAT-->
                                        <input value="{{ $pesanan->total_weight }}" type="hidden" class="form-control" name="weight" id="weight">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-md btn-success btn-block btn-check mt-4 mb-4 ">CEK ONGKOS KIRIM</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
