@extends('layouts.main')

@section('content')

<head>
    <title>Bantenese Furniture : Edit Alamat</title>
</head>

<div class="imagebg2">
    <div class="container p-5 m5">
        <nav aria-label="breadcrumb">
            <ol class="transparen breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="../../../../account">Akun</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alamat</li>
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
                                <a href="../../../../../address" class="d-flex justify-content-center list-group-item list-group-item-action actived"><small>Alamat</small></a>
                                <a href="../../../../../history" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Riwayat Pemesanan</small></a>
                                <a href="../../../../../payment" class="d-flex justify-content-center list-group-item list-group-item-action"><small>Cara Pembayaran</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="shopping-cart">
                    <div class="transparen card" style="">
                        <div class="card-header">
                            Update Data Pribadi
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
                                            <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ $a->name }}" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="">Alamat Lengkap</label>
                                            <textarea name="address" class="form-control" placeholder="Alamat Lengkap" required>{{ $a->address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="Province">Provinsi</label>
                                            <select class="form-control" name="province_destination" id="province_destination" required>
                                                <option value="">Pilih Provinsi</option>
                                                @foreach ($provinces as $province => $value)
                                                <option value="{{ $province }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="City">Kota/Kabupaten</label>
                                            <select class="form-control" name="city_destination" id="city_destination" required>
                                                <option value="">Pilih Kota/Kabupaten</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="disabledTextInput">No WA</label>
                                            <input name="no_wa" type="number" class="form-control" placeholder="Nomor WhatsApp" value="{{ $a->no_wa }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Kode Pos</label>
                                            <input name="post_code" type="number" class="form-control" placeholder="Kode Pos" value="{{ $a->post_code }}" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-dark btn-block">Update Data</button>
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

@section('js')
<script>
    $(document).ready(function() {
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
