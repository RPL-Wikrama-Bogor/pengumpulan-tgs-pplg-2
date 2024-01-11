@extends('layouts.template')

@section('content')
<div class="mt-5">
    <form action="{{ route('order.search') }}" method="GET">
    <input type="date" name="search">
    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Cari</button>
    <a href="{{ route('order.index') }}" class="btn btn-primary"><i class="bi bi-repeat"></i> Reset</a>
    <div class="d-flex justify-content-end">
        <a href="{{ route('order.create') }}" class="btn btn-primary">Tambah Pembelian</a>
    </div>
        </form>
        <table class="table-striped w-100 table mt-3">
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
                @php
                    $no = 1;@endphp
                    @foreach ($orders as $order)
                    <tr>
                        {{--currenpage : ambil posisi ada di page ke berapa - (misal uda di klik next lg ada ada 
                        page dua berarti jadi 2-1 =1) perpage mengambil jumlah data yang ditampilkan per 
                        page nya berapa (ada di controller bagian paginate/simplePaginate, misal 5), loop->index : 
                        mengambil inde dr array (mulai dari 0)+1 --}}
                        {{--jdi : (2-1) x 5 +1 = 6 (dimulai dari angka 6 di page ke 2nya )--}}
                        <td>{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1}}</td>
                        <td>{{ $order['name_customer'] }}</td>
                        <td>
                            <ol>
                                @foreach ($order ['medicines'] as $medicine)
                                    <li>{{ $medicine['name_medicine'] }} <small>Rp. {{ number_format($medicine['price'],
                                    0,',','.') }} <b>(qty : {{ $medicine['qty'] }})</b></small> = Rp. {{ number_format($medicine['price_after_qty'],
                                    0, ',', '.') }}</li>
                                @endforeach
                            </ol>
                        </td>
                        @php
                            $ppn = $order['total_price'] * 0.1;
                        @endphp
                        <td>Rp. {{ number_format(($order['total_price']+$ppn), 0, ',','.') }}</td>
                        <td>{{ $order['user']['name'] }} (<a href="mailto:">{{ $order['user']['email'] }})</a></td>
                        @php
                            setLocale(LC_ALL, 'IND');
                        @endphp
                        <td>{{ Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %B %Y') }}</td>
                        <td><a href="{{ route('order.download-pdf', $order['id']) }}" class="btn btn-success"><i class="bi bi-download"></i>  Unduh (.pdf)</a></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-end">
       @if ($orders->count())
        {{ $orders->links() }}
        @endif
    </div>
@endsection