@extends('layouts.main')

@section('content')


<head>
    <title>Bantenese Furniture : Dashboard</title>
</head>

<div class="imagebg2">
    <div class="container p-5 m5">
        <nav aria-label="breadcrumb">
            <ol class="transparen breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="../../../../account">Akun</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-3">
                <div class="card shopping-cart">
                    <div class="card-body">
                        <div class="" id="">
                            <div class="list-group list-group-flush">
                                <a href="../../../../../account" class="d-flex justify-content-center list-group-item list-group-item-action actived"><small>Dashboard</small></a>
                                <a href="../../../../../wishlist" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Wishlist</small></a>
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
                <div class="shopping-cart d-none d-sm-block">
                    <div class="row">

                        @forelse($pesanan as $p)
                        <div class="col-sm-4 col-md-4  d-flex justify-content-center">
                            <div class="transparen card dashcard" style="width: 18rem;">
                                <h5 class="card-header text-center">Status Pengiriman</h5>
                                <div class="card-body dashcard">
                                    @if($p->status=='1')
                                    <h6 class="text-warning">Belum Dibayar</h6>
                                    @endif
                                    @if($p->status=='2')
                                    <h6 class="text-info">Proses</h6>
                                    @endif
                                    @if($p->status=='3')
                                    <h6 class="text-success">Selesai</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="container-fluid">
                            <div class="transparen card dashcard">
                                <h5 class="card-header text-center">Status Pengiriman</h5>
                                <div class="card-body dashcard">
                                    <h6 class="text-center">Anda belum memiliki pesanan apapun</h6>
                                </div>
                            </div>
                        </div>
                        @endforelse

                    </div>
                </div>
                <div class="shopping-cart">
                    <div class="transparen card" style="">
                        <div class="card-header">
                            Data Pribadi
                        </div>
                        <div class="card-body">

                            @foreach($address as $a)
                            <form method="post" action="/address/update">
                                @csrf

                                <input type="hidden" name="id" value="{{ $a->id }}">
                                <fieldset>
                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="disabledTextInput">Nama Lengkap</label>
                                            <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ $a->name }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="">Alamat Lengkap</label>
                                            <textarea name="address" class="form-control" placeholder="Alamat Lengkap" readonly>{{ $a->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="Province">Provinsi</label>
                                            <input name="no_wa" type="text" class="form-control" placeholder="Nomor WhatsApp" value="{{ $a->province->title }}" readonly>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="City">Kota/Kabupaten</label>
                                            @foreach ($city as $c)
                                            @if($a->city_id == $c->city_id)
                                            <input name="no_wa" type="text" class="form-control" placeholder="Nomor WhatsApp" value="{{ $c->title }}" readonly>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="disabledTextInput">No WA</label>
                                            <input name="no_wa" type="text" class="form-control" placeholder="Nomor WhatsApp" value="{{ $a->no_wa }}" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Kode Pos</label>
                                            <input name="post_code" type="text" class="form-control" placeholder="Kode Pos" value="{{ $a->post_code }}" readonly>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
