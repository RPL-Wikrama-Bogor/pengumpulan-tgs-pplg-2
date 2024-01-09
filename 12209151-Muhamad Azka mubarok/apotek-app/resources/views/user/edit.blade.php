@extends('layouts.template')

@section('content')
    <form action="{{route ('user.update', $user['id']) }}" method="post" class=" card mt-5 p-4 bg-light ">

        {{-- token mengakes database   --}}
        @csrf

        {{-- menimpa method post dari form agar berubah menjadu patch --}}
        @method('PATCH')

        {{-- jika terjadi error validasi, alam ditampilkan bagian error nya : --}}
        @if ($errors->any())
            <ul class="alert alert-danger p-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>


        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="role" class="col-sm-2 col-form-label">Tipe Pengguna : </label>
            <div class="col-sm-10">

                <select class="form-control" id="role" name="role">

                    <option disabled hidden selected> --Pilih-- </option>

                    <option value="admin"> Admin </option>
                    <option value="cashier"> Cashier </option>

                </select>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Ubah Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="password" name="password">
            </div>
        </div>



        <button type="submit" class="btn btn-primary"> Simpan data </button>



    </form>
@endsection
