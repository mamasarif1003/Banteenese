@extends('layouts.admin')

@section('content')

<head>
    <title>Detail Barang</title>
    <style>
        form {
            display: contents;
        }

    </style>
</head>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Detail Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../../../product">Barang</a></li>
            <li class="breadcrumb-item active">Detail Barang</li>
        </ol>

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info mr-1"></i>
                Detail Barang
            </div>
            @foreach($product as $p)
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <center>
                            <img src="{{ url('../../../produk/'.$p->pict) }}" width="500px" class="img-fluid img-center">
                        </center>
                    </div>
                    <div class="container">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Detail</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <p><?php echo $p->description; ?></p>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h2 class="mt-4">{{ $p->name }}</h2><br>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>Stok</td>
                                                <td><b>:</b></td>
                                                <td>
                                                    @if($p->stock=='1')
                                                    <h6 style="color:green;">Ada</h6>
                                                    @endif
                                                    @if($p->stock=='0')
                                                    <h6 style="color:red;">Kosong</h6>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Kategori</td>
                                                <td><b>:</b></td>
                                                <td>{{ $p->category }}</td>
                                            </tr>
                                            <tr>
                                                <td>Harga</td>
                                                <td><b>:</b></td>
                                                <td>Rp. {{ number_format($p->price) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Warna</td>
                                                <td><b>:</b></td>
                                                <td>{{ $p->color }}</td>
                                            </tr>
                                            <tr>
                                                <td>Berat</td>
                                                <td><b>:</b></td>
                                                <td>{{ number_format($p->weight) }} gram</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>

@endsection
