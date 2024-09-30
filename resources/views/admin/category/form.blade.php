@extends('layouts.admin')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>Tambah Kategori</title>
    <style>
        .card {
            width: 100%;
        }

        form {
            display: contents;
        }

    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Kategori</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../category/create">Kategori</a></li>
            <li class="breadcrumb-item active">Tambah Kategori</li>
        </ol>

        <!--CARD-->
        <div class="col-md-12">

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
                    <i class="fas fa-table mr-1"></i>
                    Kategori
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <input type="text" name="category" class="form-control" placeholder="Kategori" value="{{ old('category') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kategori</th>
                                    <th scope="col">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1 ?>
                                @foreach($category as $c)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $c->category }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ route('category.edit', [$c->id]) }}">Edit</a>
                                        <form action="{{route('category.destroy', [$c->id])}}" method="POST">
                                            @csrf
                                            <input class="btn btn-danger" type="submit" value="Hapus">
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

    </div>
</body>
@endsection
