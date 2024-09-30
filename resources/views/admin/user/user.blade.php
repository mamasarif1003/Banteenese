@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
</head>

<body>
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Daftar User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>

            @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Daftar User
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Opsi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($user as $u)
                                <tr>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->role }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>
                                        <a class="btn btn-info" href="../../user/detail/{{ $u->id }}" title="Detail"><i class="fas fa-info"></i></a>
                                        <a class="btn btn-danger" href="../../user/hapus/{{ $u->id }}" title="Hapus"><i class="fas fa-trash-alt"></i></a>
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
</body>

</html>
@endsection
