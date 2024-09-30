@extends('layouts.main')

@section('content')

<head>
    <title>Bantenese Furniture : Alamat</title>
    <style>
        form {
            display: contents;
        }

    </style>
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
                            <form action="{{route('address.destroy', [$a->id])}}" method="POST">
                                @csrf
                                <input class="btn btn-danger mt-4" type="submit" value="Hapus">
                                <input type="hidden" name="_method" value="delete">
                            </form>
                            @empty
                            <h6 class="text-center">Anda Belum Menambahkan Alamat.</h6>
                            <a href="../../address/create" type="button" class="btn btn-outline-dark float-right">Tambah Alamat</a>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
