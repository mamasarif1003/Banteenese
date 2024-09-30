@extends('layouts.admin')

@section('content')

<head>
    <title>Daftar Pesanan</title>
    <style>
        form {
            display: contents;
        }

    </style>
</head>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Data Pesanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">Pesanan</li>
            <li class="breadcrumb-item active">Data Pesanan</li>
        </ol>

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
        @endif

       <a href="{{ $pdf }}" class="btn btn-primary" target="_blank">CETAK PDF</a><br><br>
       
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table mr-1"></i>
                Data Pesanan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama User</th>
                                <th>Kurir</th>
                                <th>Pembayaran</th>
                                <th>Tagihan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama User</th>
                                <th>Kurir</th>
                                <th>Pembayaran</th>
                                <th>Tagihan</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                           <?php $no=1; ?>
                            @foreach($pesanan as $p)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <th scope="row">{{ $p->code }}</th>
                                <td>{{ $p->username }}</td>
                                <td>{{ $p->kurir }}</td>
                                <td>{{ $p->pembayaran }}</td>
                                <td>Rp {{ number_format($p->total_tagihan) }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('order.show', [$p->id]) }}" title="Detail"><i class="fas fa-info"></i></a>
                                    <a class="btn btn-success" href="{{ route('order.edit', [$p->id]) }}" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{route('order.destroy', [$p->id])}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
