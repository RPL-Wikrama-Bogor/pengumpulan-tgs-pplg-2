@extends('layout.template')

@section('content')
<form action="{{ route('order.store')   }}" class=" p-4 mt-5 align-items-center" method="POST">
    @csrf
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>  
            @endforeach
        </ul>
    @endif
    <div class="mb-3 d-flex">
        <label for="name_customer" class="form-label" style="width: 15%">Penanggung Jawab :</label>
        <div style="width: 85%"><b>{{ Auth::user()->name}}</b></div>
    </div>
    <div class="mb-3 d-flex align-items-center">
        <label for="name_customer" id="name_customer" class="form-label" style="width: 12%">Nama Pembeli :</label>
        <input type="text" name="name_customer" class="form-control" style="width:88%" id="">
    </div>
    <div class="mb-3 d-flex align-items-center">
        <label for="medicines" id="name_customer" class="form-label cursor:pointer" style="width: 12%">Obat :</label>
        <select name="medicines[]" id="medicines" class="form-control" style="width: 88%">
            <option selected hidden disabled>Pesanan 1</option>
            @foreach($medicines as $medicine) {
                <option value="{{$medicine['id']}}">{{$medicine['name']}}</option>
            }
            @endforeach
        </select>
    </div>
    <div id="wrap-select"></div>
    <p class="text-primary" style="margin-left:12%; margin-top:10px; cursor:pointer" onclick="addSelect()">+ tambah pesanan</p>
    <button style="submit; margin-left:12%; margin-top:10px; cursor:pointer" class="btn btn-block btn-primary">borong</button>
</form>
@endsection

@push('script')
    <script>
        let no = 2;

        function addSelect() {
            let el = `<div class="d-flex align-items-center mb-3">
                <label for="medicines" class="form-label" style="width: 12%;"></label>
                <select name="medicines[]" id="medicines" class="form-control" style="width: 88%">
                    <option selected hidden disabled>Pesanan ${no}</option>
                        @foreach($medicines as $medicine)
                        <option value="{{$medicine['id']}}">{{$medicine['name']}}</option>
                        @endforeach
                </select>
            </div>`;

            $("#wrap-select").append(el);

            no++;
        }
    </script>
@endpush
