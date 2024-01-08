@extends('layouts.template')

@section('content')
    <form action="{{ route('order.store') }}" class="card p-4 mt-5" method="POST">
        @csrf
        @if (($errors)->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="mb-3">
            <div class="d-flex align-items-center mb-3">
                <label for="name_customer" class="form-label col-2" style="width: 14%">Penanggung Jawab :</label>
                <p style="width: 86%; margin-top: 10px;"><b>{{ Auth::user()->name }}</b></p>
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label for="name_customer" class="form-label col-2" style="width: 11%">Nama Pembeli : </label>
                <input type="text" name="name_customer" id="name_customer" class="form-control" style="width:89%">
            </div>
            <div class="mb-3 d-flex align-items-center">
                <label for="medicines" class="form-label col-2" style="width: 11%">Obat : </label>
                {{-- nama dengan [] digunakan untuk tipe data array/json dan biasanya digunakan apabila inout dengan tujuan data yang sama ada banyak (dan dari banyak input yg datanya sama tsb, datanya akan diambil seluruhnya dalam bentuk array) --}}
                <select name="medicines[]" id="medicines" class="form-control" style="width: 89%">
                    <option selected hidden disabled>Pesanan 1</option>
                    @foreach ($medicines as $medicine)
                        <option value="{{ $medicine['id'] }}">{{ $medicine['name'] }}</option>
                    @endforeach
                </select>
            </div>
            {{-- karna akan ada JS yang menampilkan select ketika di click, maka sediakan tempat penyimpanan element yang akan dihasilkan dari JS tersebut --}}
            <div id="wrap-select"></div>
            <p class="text-primary" style="margin-left: 11%; margin-top: 10px; cursor: pointer;" onclick="addSelect()">+Tambah Pesanan</p>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
@endsection

@push('script')
    <script>
        let no = 2;
        function addSelect() {  
            let el = `<div class="mb-3 d-flex align-items-center mb-3">
                <label for="name_customer" class="form-label col-2" style="width: 11%"></label>
                <select name="medicines[]" id="medicines" class="form-control" style="width: 89%" >
                    <option selected hidden disabled>Pesanan ${no}</option>
                    @foreach ($medicines as $medicine)
                        <option value="{{ $medicine['id'] }}">{{ $medicine['name'] }}</option>
                    @endforeach
                </select>
            </div>`;
            // gunakan jquery untuk memanggil html tempat el baru akan ditambahkan
            // append : menambahkan el html dibagian bawah sebalum penutup tag terkait
            $("#wrap-select").append(el);
            no++;
        }
    </script>
@endpush
