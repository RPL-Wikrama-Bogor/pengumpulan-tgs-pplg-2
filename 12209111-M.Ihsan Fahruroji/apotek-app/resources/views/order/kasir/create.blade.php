@extends('layouts.template')

@section('content')
    <form action="{{ route('order.store') }}" class="card p-4 mt-5" method="POST">
        @csrf
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <div class="mb-3 d-flex align-items-center">
            <label for="nama_customer" class="form-label" style="width: 15%; margin-top: 0.7%;">Penanggung Jawab : </label>
            <div style="width: 88%"><b>{{ Auth::user()->name }}</b></div>
        </div>
        <div class="mb-3 d-flex align-items-center">
            <label for="nama_customer" class="form-label" style="width: 12%">Nama Pembeli : </label>
            <input type="text" name="nama_customer" id="nama_customer" class="form-label" style="width: 88%">
        </div>
        <div class="mb-3">
            <div class="d-flex align-items-center">
                <label for="medicines" class="form-label" style="width: 12%">Obat : </label>
                {{-- name dengan [] biasanya dipake buat colunm yg tipe datanya json/array, dan biasanya digunakan apabila input dengan tujuan data yang sama ada banyak (dan dari banyak input yg datanya sama tsb, datanya akan diambil seleruhnya dlm bentuk array) --}}
                <select name="medicines[]" id="medicines" class="form-control" style="width: 88%">
                    <option selected hidden disabled>Pesanan 1</option>
                    @foreach ($medicines as $medicine)
                        <option value="{{ $medicine['id'] }}">{{ $medicine['name'] }}</option>
                    @endforeach
                </select>
            </div>
                {{-- karn akan ada Js yang menampilkan select ketika di klik, maka sediakan tempat penyimapanan element yg akan di hasilkan dari Js tersebut --}}
            </div>
            <div id="wrap-select"></div>
            <p class="text-primary" style="margin-left: 11.5%; cursor: pointer;" onclick="addSelect()">+ Tambah Pesanan</p>
            <button type="submit" class="btn-block btn btn-primary">Kirim</button>
        </div>
    </form>
@endsection

@push('script')
    <script>
        let no = 2;
        function addSelect() {
            let el = `<div class="d-flex align-items-center mb-3">
                <label for="medicines" class="form-label" style="width: 12%"></label>
                <select name="medicines[]" id="medicines" class="form-control" style="width: 88%">
                    <option selected hidden disabled>Pesanan ${no}</option>
                    @foreach($medicines as $medicine) 
                        <option value="{{ $medicine['id'] }}">{{ $medicine['name'] }}</option>
                    @endforeach
                </select>
            </div>`;
            // gunakan jquery untuk mengambil html tempat el baru akan ditambahkan
            // append : menambahkan el html dibagian bawah sebelum penutup tag terkait
            $("#wrap-select").append(el);
            // agar no pesanan bertambah sesuai jumlah select
            no++;
        }
    </script>
@endpush