@extends('layouts.admin')

@section('content')

<head>
    <meta charset="UTF-8">
    <title>Edit Warna</title>
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
        <h1 class="mt-4">Edit Warna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../color/create">Warna</a></li>
            <li class="breadcrumb-item active">Edit Warna</li>
        </ol>

        <!--CARD-->
        <div class="col-md-12">

            @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Warna
                </div>
                <div class="card-body">
                    @foreach ($color as $c)
                    <form action="{{route('color.update', $c->id)}}" method="post">
                        @csrf

                        <input type="hidden" value="PUT" name="_method">
                        <div class="form-group">
                            <label for="">Nama Warna</label>
                            <input type="text" class="form-control" name="color" placeholder="Warna" value="{{ $c->color }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</body>
@endsection
