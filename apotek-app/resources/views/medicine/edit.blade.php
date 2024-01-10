@extends('layouts.template')

@section('content')
    <form action="{{route ('medicine.update', $medicine['id']) }}" method="post" class=" card mt-5 p-4 bg-light ">

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
            <label for="name" class="col-sm-2 col-form-label">Nama Obat: </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $medicine['name'] }}">
            </div>
        </div>


        {{-- penggunaan name, id, for mengikuti yang ada di medicine(label nya) --}}

        <div class="mb-3 row">
            <label for="type" class="col-sm-2 col-form-label">Tipe Obat</label>
            <div class="col-sm-10">

                <select class="form-control" id="type" name="type">

                    <option disabled hidden selected > --Pilih-- </option>

                    <option value="tablet" {{ $medicine['type'] == 'tablet' ? 'selected' : '' }}> Tablet </option>
                    <option value="sirup" {{ $medicine['type'] == 'tablet' ? 'sirup' : '' }}> Sirup </option>
                    <option value="kapsul" {{ $medicine['type'] == 'tablet' ? 'kapsul' : '' }}> Kapsul </option>

                </select>

            </div>
        </div>

        <div class="mb-3 row">
            <label for="price" class="col-sm-2 col-form-label">Harga Obat: </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="price" name="price">
            </div>
        </div>



        <button type="submit" class="btn btn-primary"> Simpan data </button>



    </form>
@endsection
