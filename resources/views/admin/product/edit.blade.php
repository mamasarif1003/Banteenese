@extends('layouts.admin')

@section('content')

<head>
    <title>Edit Barang</title>
    <style>
        form {
            display: contents;
        }

    </style>
</head>

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Barang</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="../../../product">Barang</a></li>
            <li class="breadcrumb-item active">Edit Barang</li>
        </ol>

        @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        @endif

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit mr-1"></i>
                Edit Barang
            </div>
            <div class="card-body">
                <div class="row">

                    <!--FORM-->
                    @foreach ($product as $p)
                    <form action="{{route('product.update', $p->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Barang</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Barang" value="{{ $p->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="pict">Gambar</label><br>
                                <img src="{{ url('/produk/'.$p->pict) }}" width="150">
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input type="text" name="price" class="form-control" placeholder="Harga" value="{{ $p->price }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Berat (gram)</label>
                                <input type="text" name="weight" class="form-control" placeholder="Berat" value="{{ $p->weight }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">URL</label>
                                <input type="text" name="url" class="form-control" placeholder="URL" value="{{ $p->url }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select class="form-control" name="category">
                                    @foreach ($category as $c)
                                    <option value="{{ $c->category }}" @if($p->category == $c->category)
                                        selected
                                        @endif>{{ $c->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Stok</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="1" name="stock" class="custom-control-input" value="1" @if($p->stock=='1')
                                    checked
                                    @endif>
                                    <label class="custom-control-label" for="1">Stok Ada</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="0" name="stock" class="custom-control-input" value="0" @if($p->stock=='0')
                                    checked
                                    @endif>
                                    <label class="custom-control-label" for="0">Stok Kosong</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Warna (Pisahkan dengan koma(,))</label><br>
                                <input class="form-control" type="text" name="color" placeholder="Warna" value="{{ $p->color }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="description" class="ckeditor" id="ckeditor"><?php echo $p->description; ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-block btn-dark">Update Barang</button>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</main>

@endsection
