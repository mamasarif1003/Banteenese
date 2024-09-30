@extends('layouts.main')

@section('content')


<head>
    <title>Bantenese Furniture : Checkout</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        form {
            display: contents;
        }

    </style>
</head>

<div class="imagebg2">
    <div class="container p-5 m5">
        <nav aria-label="breadcrumb" class="mb-n3">
            <ol class="transparen breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="../../../../account">Akun</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
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

                        @if(session()->has('alert'))
                        <div class="alert alert-warning">
                            {{ session()->get('alert') }}
                        </div>
                        @endif

                        <!-- PRODUCT -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Warna</th>
                                        <th scope="col">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barang as $b)
                                    <tr>
                                        <td>
                                            <img class="img-responsive rounded-lg" src="{{ url('../../produk/'.$b->photo) }}" alt="preview" width="80">
                                        </td>
                                        <td>
                                            {{ $b->item_name }}
                                        </td>
                                        <td>
                                            {{ $b->item_total }}
                                        </td>
                                        <td>
                                            {{ $b->color }}
                                        </td>
                                        <td>
                                            <strong style="color: #6E6E6E; font-weight: 600;">Rp {{ number_format($b->jumlah_harga) }}</strong>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <td colspan="4"><b>Jumlah Harga</b></td>
                                    <td><b>Rp {{ number_format($pesanan->total_harga) }}</b></td>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <!-- END PRODUCT -->

                        <!--Alamat & Kurir-->
                        <div class="transparen card">

                            @if(session()->has('status'))
                            <div class="alert alert-success">
                                {{ session()->get('status') }}
                            </div>
                            @endif

                            @if(session()->has('alert'))
                            <div class="alert alert-warning">
                                {{ session()->get('alert') }}
                            </div>
                            @endif

                            <div class="card-header">
                                Alamat
                            </div>
                            <div class="card-body">
                                @forelse($address as $a)
                                <h6>{{ $a->name }}</h6>
                                <h6>{{ $a->address }}</h6>
                                <h6>{{ $a->province->title }}</h6>
                                @foreach ($city as $c)
                                @if($a->city_id == $c->city_id)
                                <h6>{{ $c->title }}</h6>
                                @endif
                                @endforeach
                                <h6>{{ $a->post_code }}</h6>
                                <h6>{{ $a->no_wa }}</h6>
                                <a class="btn btn-success float-right mt-4" href="{{ route('address.edit', [$a->id]) }}">Edit</a>
                                @empty
                                <h6 class="text-center">Anda Belum Menambahkan Alamat.</h6>
                                <a href="../../address/create" type="button" class="btn btn-outline-dark float-right">Tambah Alamat</a>
                                @endforelse
                            </div>
                        </div>

                        <!--Tagihan-->
                        <div class="transparen card mt-4">
                            <div class="card-body">
                                <h3>TAGIHAN</h3>
                                <hr>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Total Harga Barang</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($pesanan->total_harga) }}</td>
                                        <input type="hidden" value="30000000" name="harga">
                                    </tr>
                                    <tr>
                                        <td>Ongkos Kirim</td>
                                        <td>:</td>
                                        <td id="shipping_cost">Rp {{ number_format($pesanan->ongkir) }}</td>
                                    </tr>
                                    <td colspan="2"><b>Total Tagihan</b></td>
                                    <td name="total_tagihan">Rp {{ number_format($pesanan->total_tagihan) }}</td>
                                </table>
                            </div>
                        </div>

                        <form action="/updatebayar" method="post">
                            @csrf

                            <!--pembayaran-->
                            <div class="transparen card mt-4 border-white">
                                <div class="card-body">
                                    <h3>PEMBAYARAN</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input name="pembayaran" value="BRI" type="radio" checked>
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="BRI" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input name="pembayaran" value="BNI" type="radio">
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="BNI" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input name="pembayaran" value="BNI Syariah" type="radio">
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="BNI Syariah" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input name="pembayaran" value="Mandiri" type="radio">
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="MANDIRI" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input name="pembayaran" value="BCA" type="radio">
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="BCA" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <input name="pembayaran" value="Lainnya" type="radio">
                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="LAINNYA" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Kode Random-->
                            <?php $random = mt_rand(1000,9999);?>
                            <input type="hidden" name="code" value="{{ $random }}">

                            <!--Catatan-->
                            <div class="transparen card mt-4 border-white">
                                <div class="card-body">
                                    <h3>CATATAN</h3>
                                    <hr>
                                    <textarea name="note" class="form-control" placeholder="contoh: 2 produk beda warna, pembayaran lainnya. dll."></textarea>
                                </div>
                            </div><br>
                            <button type="submit" class="btn btn-outline-dark btn-block">Buat Pesanan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('js')

<!--
<script>
    $(document).ready(function() {
        //active select2
        $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
            theme: 'bootstrap4',
            width: 'style',
        });
        //ajax select kota asal
        $('select[name="province_origin"]').on('change', function() {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/cities/' + provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('select[name="city_origin"]').empty();
                        $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                        $.each(response, function(key, value) {
                            $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
            }
        });
        //ajax select kota tujuan
        $('select[name="province_destination"]').on('change', function() {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: '/cities/' + provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('select[name="city_destination"]').empty();
                        $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                        $.each(response, function(key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
            }
        });
        //ajax check ongkir
        let isProcessing = false;
        $('.btn-check').click(function(e) {
            e.preventDefault();

            let token = $("meta[name='csrf-token']").attr("content");
            let city_origin = $('select[name=city_origin]').val();
            let city_destination = $('select[name=city_destination]').val();
            let courier = $('select[name=courier]').val();
            let weight = $('#weight').val();

            if (isProcessing) {
                return;
            }

            isProcessing = true;
            jQuery.ajax({
                url: "/ongkir",
                data: {
                    _token: token,
                    city_origin: city_origin,
                    city_destination: city_destination,
                    courier: courier,
                    weight: weight,
                },
                dataType: "JSON",
                type: "POST",
                success: function(response) {
                    isProcessing = false;
                    if (response) {
                        $('#ongkir').empty();
                        $('.ongkir').addClass('d-block');
                        $.each(response[0]['costs'], function(key, value) {
                            $('#ongkir').append('<option value="' + value.service + '">' + response[0].code.toUpperCase() + ' : ' + value.service + ' - Rp. ' + value.cost[0].value + ' (' + value.cost[0].etd + ' hari)</option>')
                            //                            ('<li class="list-group-item">'+response[0].code.toUpperCase()+' : <strong>'+value.service+'</strong> - Rp. '+value.cost[0].value+' ('+value.cost[0].etd+' hari)</li>')

                        });

                    }
                }
            });

        });

    });

</script>
-->

<script>
    $(document).ready(function() {
        $('select[name="province_origin"]').on('change', function() {
            let provinceId = $(this).val();
            if (provinceId) {
                jQuery.ajax({
                    url: '/province/' + provinceId + '/cities',
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="city_origin"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').empty();
            }
        });
        $('select[name="province_destination"]').on('change', function() {
            let provinceId = $(this).val();
            if (provinceId) {
                jQuery.ajax({
                    url: '/province/' + provinceId + '/cities',
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="city_destination"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_destination"]').empty();
            }
        });
    });

</script>

@endsection

@endsection
