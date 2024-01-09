@extends('layouts.template')

@section('content')
    <form action="{{route('user.user_data')}}" method="post" class="card bg-light mt-5 p-5">
        {{--sebagai-token-akses-database --}}
        @csrf
        {{-- jika terjadi error di validasi, akan ditampilkan bagian error nya : --}}
        @if ($errors->any())
            <ul class="alert alert-danger p-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        {{-- jika berhasil munculkan notifnya : --}}
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>            
        @endif
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama User :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password" value="1" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Role :</label>
            <div class="col-sm-10">
                <select id="role" class="form-control" name="role">
                    <option disabled hidden selected>Pilih</option>
                    <option value="admin">Admin</option>
                    <option value="cashier">Cashier</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            {{-- <label for="stock" class="col-sm-2 col-form-label">Stock Awal:</label> --}}
            {{-- <div class="col-sm-10">
                <input type="number" class="form-control" id="stock" name="stock">
            </div> --}}
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
@endsection
