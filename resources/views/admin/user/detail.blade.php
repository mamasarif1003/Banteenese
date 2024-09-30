@extends('layouts.admin')

@section('content')

<main>
    <div class="container-fluid">
        <h1 class="mt-4">Detail User</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="../../../admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Detail User</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-info mr-1"></i>
                Detail User
            </div>
            @forelse($address as $a)
            <div class="container mt-3">
                <form method="post" action="/address/update">
                    @csrf

                    <input type="hidden" name="id" value="{{ $a->id }}">
                    <fieldset>
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="disabledTextInput">Nama Lengkap</label>
                                <input name="name" type="text" class="form-control" placeholder="Nama Lengkap" value="{{ $a->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="">Alamat Lengkap</label>
                                <textarea name="address" class="form-control" placeholder="Alamat Lengkap" readonly>{{ $a->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-8 mb-3">
                                <label for="Province">Provinsi</label>
                                <input name="no_wa" type="text" class="form-control" placeholder="Nomor WhatsApp" value="{{ $a->province->title }}" readonly>
                            </div>
                            <div class="col-md-8 mb-3">
                                <label for="City">Kota/Kabupaten</label>
                                @foreach ($city as $c)
                                @if($a->city_id == $c->city_id)
                                <input name="no_wa" type="text" class="form-control" placeholder="Nomor WhatsApp" value="{{ $c->title }}" readonly>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="disabledTextInput">No WA</label>
                                <input name="no_wa" type="text" class="form-control" placeholder="Nomor WhatsApp" value="{{ $a->no_wa }}" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Kode Pos</label>
                                <input name="post_code" type="text" class="form-control" placeholder="Kode Pos" value="{{ $a->post_code }}" readonly>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>

            @empty
            <h5 class="text-center mt-3 mb-3">Data User ini Masih Kosong</h5>
            @endforelse
        </div>
    </div>
</main>
@endsection
