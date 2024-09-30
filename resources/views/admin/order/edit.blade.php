@extends('layouts.admin')

@section('content')

<head>
    <title>Edit Pesanan</title>
    <style>
        form {
            display: contents;
        }

    </style>
</head>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Pesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Pesanan</li>
            <li class="breadcrumb-item active">Edit Pesanan</li>
        </ol>

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Edit Pesanan
            </div>
            <div class="card-body">

                <main>
                    @foreach($pesanan as $p)
                    <form action="{{route('order.update', $p->id)}}" method="post">
                        @csrf

                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-group">
                            <label for="">Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Status" value="{{ $p->status }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Resi</label>
                            <input type="text" value="{{$p->receipt_number}}" name="receipt_number" class="form-control" placeholder="Nomor Resi">
                        </div>
                        <button type="submit" class="btn btn-outline-dark btn-block">Perbarui</button>
                    </form>
                    @endforeach

                    <div class="card mt-4">
                        <div class="card-header"><b>Status</b></div>
                        <div class="card-body">
                            0 : Belum Checkout / Masih di Keranjang <br>
                            1 : Pesanan Masuk <br>
                            2 : Pesanan Diproses <br>
                            3 : Pesanan Selesai <br>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</main>

@endsection
