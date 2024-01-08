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
            <label for="name_customer" class="form-label" style="width: 15%">Penanggung jawab :</label>
            <div style="width: 85%"><b>{{ Auth::user()->name }}</b></div>
        </div>
        <div class="mb-3 d-flex align-items-center">
            <label for="name_customer" class="form-label" style="width: 12%">Nama Pembeli :</label>
            <input type="text" name="name_customer" id="name_customer" class="form-control" style="width: 80%">
        </div>
        <div class="mb-3">
        <div class="mb-3 d-flex align-items-center">
            <label for="medicines" class="form-label" style="width: 12%">Obat :</label>
            <select name="medicines[]" id="medicines" class="form-control" style="width: 80%">
                <option selected hidden disabled>Pesanan 1</option>
                @foreach ($medicines as $medicine)
                    <option value="{{ $medicine['id'] }}">{{ $medicine['name'] }}</option>
                @endforeach
            </select>
            </div>
            <div id="wrap-select"></div>
            <p class="text-primary" style="margin-left: 12%; margin-top: 10px; cursor: pointer;" onclick="addSelect()"> +Tambah Pesanan</p>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
    </form>
@endsection

@push('script')
    <script>
        let no = 2;
        function addSelect() {
            let el =  `<div class="mb-3 d-flex align-items-center">
            <label for="medicines" class="form-label" style="width: 12%"></label>
            <select name="medicines[]" id="medicines" class="form-control" style="width: 80%">
                <option selected hidden disabled>Pesanan ${no}</option>
                @foreach ($medicines as $medicine)
                    <option value="{{ $medicine['id'] }}">{{ $medicine['name'] }}</option>
                @endforeach
            </select>
            </div>`;
            $("#wrap-select").append(el);

            no++;

        }
    </script>  
@endpush