@extends('layouts.template')

@section('content')
    <form action="{{route('order.store')}}" class="card p-4 mt-5" method="POST">
        @csrf
        @if ($errors->any()){
            <ul class="alert alert-danger">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        }
        @endif
        <div class="mb-3 d-flex align-items-center">
            <label for="name_customer" class="form-label" style="width: 15%">Penanggung Jawab :</label>
            <div class="p" style="width:85%; margin-bottom:1%;"><b>{{Auth::user()->name}}</b></div>
        </div>
        <div class="mb-3 d-flex align-items-center">
            <label for="name_customer" class="form-label" style="width: 12%">Nama Pembeli</label>
            <input type="text" name="name_customer" id="name_customer" class="form-control" style="width:88%">
        </div>

        <div class="mb-3">
        <div class="d-flex align-items-center">
            <label for="medicines" class="form-label" style="width: 12%">Obat : </label>
            {{-- name dengan [] biasanya dipake buat column yang tipe datanya json/array,dan biasaanya digunakan apabila input dengan tujuan data yang sama ada banyak (dan dari input yang baanyak datanya tersebut , datanya akan diambil seluruhnya dalam bentuk array ) --}}
            <select type="text" name="medicines[]" id="medicines" class="form-control" style="width:88%">
                <option selected hidden disabled>
                    Pesanan 1
                </option>
                @foreach ($medicines as $medicine)
                <option value="{{$medicine['id']}}">{{$medicine['name']}}</option>
                @endforeach
            </select>
        </div>
            {{-- karena akan ada js yg menampilkan select ketika di klik maka disediakan btempat elemen yang akan dihasilkan dari js tersebut --}}
    </div>
            <div id="wrap-select"></div>
            <p class="text-primary" style="margin-left:11.5%;cursor: pointer;" onclick="addSelect()">+ Tambah Pesanan</p>
            <button type="submit" class="btn-block btn-primary">Kirim</button>
        
    </form>
@endsection
@push('script')
    <script>
        let no = 2;
        function addSelect(){
            let el = `<div class="d-flex align-items-center mb-3">
            <label for="medicines" class="form-label" style="width: 12%"></label>
            {{-- name dengan [] biasanya dipake buat column yang tipe datanya json/array,dan biasaanya digunakan apabila input dengan tujuan data yang sama ada banyak (dan dari input yang banyak datanya tersebut , datanya akan diambil seluruhnya dalam bentuk array ) --}}
            <select type="text" name="medicines[]" id="medicines" class="form-control" style="width:88%">
                <option selected hidden disabled>
                    Pesanan ${no}
                </option>
                @foreach ($medicines as $medicine)
                <option value="{{$medicine['id']}}">{{$medicine['name']}}</option>
                @endforeach
            </select>
        </div>`;
        // gunakan jquery untuk mengambil html tempatel baru yang aka ditambahkan
        // append : menambahakn html bagian bawah 
        $("#wrap-select").append(el);
        no++;
        }
        </script>
@endpush