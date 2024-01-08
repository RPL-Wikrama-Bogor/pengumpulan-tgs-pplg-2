{{-- memanggil file template --}}
@extends('layouts.template')

{{-- isi bagian yield --}}
@section('content')
<div class="mt-5">
    <div class=" justify-content-start" style="width: 30%;height:10%;">
        <form action="{{route('order.search')}}" class="" method="GET" style="display: flex;justify-content:space-between;">
            <label for="search" class="form-label" style="width:30%" >Search :</label>
            <input type="date" name="search" id="search" class="" style="width:100%;margin-left:5%;" >
            <button type="submit" class="btn btn-primary mr-5" style="margin-left:5%;">cari</button>
        </form>
    </div>
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary mr-5" href="{{route('order.index')}}" style="margin-right:2%;">Reset</a>
        <a class="btn btn-primary" href="{{route('order.create')}}" >Pembelian Baru</a>
    
    </div>

    <table class="table mt-3 table-striped w-100 table-bordered table-hovered">
</div>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Pesanan</th>
            <th>Total Bayar</th>
            <th>Kasir</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
        {{-- current page : ambil posisi di page keberapa -1 (misal udah klik next udah di page 2 berari jadi 2-1 = 1)
            perpage : mengambil jumlah data yang ditampilkjan di page nya berapa (ada dicontroller di bagian paginate atau simple paginate ,misal 5) 
            loop->index : mengambil index dari (array mulai dari 0) + 1 --}}

            <td>{{ ($orders->currentPage()-1) * $orders->perpage() + $loop->index + 1}}</td>
            <td>{{$order['name_customer']}}</td>
            <td>
                <ol>
                    {{-- Nested Loop : Looping didalam looping --}}
                    {{-- karena column medicines pada table orders tipe datanya json , jadi aksesnya bitih looping --}}
                    @foreach ($order['medicines'] as $medicine)
                    {{-- tampilan yang ingin ditampilkan : --}}
                    {{-- output: 1. nama_obat Rp.3.000 (qty2) --}}
                        <li>{{$medicine['name_medicine']}} <small>Rp. {{number_format(
                            $medicine['price'],0,'.',',')}} 
                            <b>(qty : {{$medicine['qty'] }})</b>
                        </small>
                         = Rp.{{number_format($medicine['price_after_qty'],0,'.',',')}}</li>
                    @endforeach
                </ol>
            </td>
            @php
                $ppn = $order['total_price'] * 0.1;
            @endphp
            <td>Rp.{{number_format($order['total_price'] + $ppn,0,'.',',')}}</td>
            <td>{{$order['user']['name']}} <a href="mailto:Kasir@gmail.com">(Kasir@gmail.com)</a></td>
            @php
            setLocale(LC_ALL, 'id_ID');
            @endphp
            <td>{{Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %B %Y')}}</td>
            <td >
                <div class="d-flex justify-content-end mt-3">
                {{-- mengambil column dari relasi, $ variabel ["namaFunctionDiModel],[namFunctionDiClass] --}}
                    <a href="{{route('order.download-pdf',$order['id'])}}" class="btn btn-success">Cetak (.pdf)</a>
                
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
<div class="d-flex justify-content-end
">
@if ($orders->count())
{{$orders->links()}}
@endif
</div>
@endsection