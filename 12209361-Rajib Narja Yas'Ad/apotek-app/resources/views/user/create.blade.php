@extends('layout.template')

@section('content')
    <form action="{{route('user.store')}}" method="post">
        {{--sebagai token akses ke database --}}
        @csrf
        {{--jika terjadi error validasi, akan ditambahkan bagian errornya --}}
        @if ($errors->any())
        <ul class="alert-alert-danger p-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        {{-- jika berhasil munculkan errornya--}}
        @if (Session::get('success'))
            <div class="alert alert-success"> {{ Session::get('success' ) }}</div>
        @endif
        <div class="mb-3 mt-5 row">
            <label for="name" class="col-sm-2 col-form-label">Nama :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="mb-3 mt-5 row">
            <label for="name" class="col-sm-2 col-form-label">Email :</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">role :</label>
            <div class="col-sm-10">
                <select id="role" class="form-control" name="role">
                    <option disabled hidden selected>Pilih</option>
                    <option value="admin">atmint</option>
                    <option value="cashier">kasyir</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
        <a href="{{ route('user.data')}}" class="btn btn-secondary">close</a>
        </div>
        </div>
    </form>
@endsection