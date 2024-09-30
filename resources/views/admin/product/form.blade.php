@extends('layouts.admin')

@section('content')

<head>
    <title>Tambah Barang</title>
    <style>
        form {
            display: contents;
        }

    </style>
</head>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../../../product">Barang</a></li>
            <li class="breadcrumb-item active">Tambah Barang</li>
        </ol>

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }},
            @endforeach
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-upload mr-1"></i>
                Tambah Barang
            </div>
            <div class="card-body">
                <div class="row">

                    <!--FORM-->
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Barang" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="pict">Upload Gambar</label>
                                <input type="file" class="form-control-file" name="pict" value="{{ old('pict') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="price" class="form-control" placeholder="Harga" value="{{ old('price') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Berat (gram)</label>
                                <input type="text" name="weight" class="form-control" placeholder="Berat" value="{{ old('weight') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Warna</label><br>
                                @foreach($color as $c)
                                <div class="form-check form-check-inline">
                                    <input name="color[]" class="form-check-input" type="checkbox" value="{{ $c->color }}">
                                    <label class="form-check-label" for="inlineCheckbox1">{{ $c->color }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select class="form-control" name="category">
                                    @foreach($category as $c)
                                    <option>{{ $c->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="1" name="stock" class="custom-control-input" value="1" checked>
                                    <label class="custom-control-label" for="1" style="color:green;">Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="0" name="stock" class="custom-control-input" value="0">
                                    <label class="custom-control-label" for="0" style="color:red;">Kosong</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" class="ckeditor" id="ckeditor">{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-dark">Tambah Barang</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</main>

@endsection
