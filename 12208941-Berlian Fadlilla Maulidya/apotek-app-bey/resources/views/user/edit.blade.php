@extends('layouts.tamplate')

@section('content')
    <form action="{{ route('user.update', $user['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        @if ($errors->any())
            <ul class="alert alert-danger p-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif  

    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $user['nama'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password :</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password">
        </div>
    </div>

    <div class="mb-3 row" style="border: 1px solid balack;">
        <label for="role" class="col-sm-2 col-form-label">Role :</label>
        <div class="col-sm-10">
            <select class="form-select" name="role" id="role">
                <option selected disabled hidden>Pilih</option>
                <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>admin</option>
                <option value="cashier" {{ $user['role'] == 'cashier' ? 'selected' : '' }}>kasir</option>
            </select>
        </div>
    </div>

        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>


@endsection