@extends('layouts.template')

@section('content')
    <div class="container mt-3">
        <div class="d-flex">
            <form action="{{ route('order.search') }}" method="GET">
                <input type="date" name="date" placeholder="Tanggal"  class="form-control" style="width: 300px">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{route('order.index')}}" class="btn btn-dark" style="margin-right: 30px">Reset</a>
            <a href="{{route('order.create')}}" class="btn btn-primary">Tambah pembelian</a>
        </div>
        <table class="table-stripped w-100 table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Pesanan</th>
                    <th>Total Bayar</th>
                    <th>Kasir</th>
                    <th>tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($orders as $order)
                <tr>
                    {{-- currentpage : ambil posisi ada di page keberapa - 1 (misal dua klik next ada di page 2 berarti menjadi 2-1 = 1), perpage : mengambil jumlah data yg ditampilkan per pagenya berapa (ada di controller bagian paginate.simpelPaginate, misal 5), loop->index : mengambil index dr array (mulai dr 0)+1 --}}
                    {{-- jadi : (2-1) x 5 + 1 = 6 (dimulai dr angka 6 di page ke 2 nya) --}}
                    <td>{{ ($orders->currentPage()-1) * $orders->perpage() + $loop->index + 1 }}</td>
                    <th>{{ $order['name_customer'] }}</th>
                    {{-- nested loop : looping di dalam looping --}}
                    {{-- karena colunm medicines pada table orders tipe datanya json, jd untuk akses nya perlu looping --}}
                    <td>
                        <ol>
                    @foreach ($order['medicines'] as $medicine)
                    {{-- tampilan yang ingin ditampilkan : --}}
                    {{-- 1. Nama obat Rp. 1.000 (qty 2) = Rp. 2.000 --}}
                        <li>{{ $medicine['name_medicine'] }} <small>Rp. {{ number_format($medicine['price'], 0, '.',',') }}<b>(qty : {{ $medicine['qty'] }})</b></small> = Rp. {{ number_format($medicine['price_after_qty'], 0, '.', ',') }}</li>
                    @endforeach
                        </ol>
                    </td>
                    @php 
                        $ppn = $order['total_price'] * 0.1;
                    @endphp
                    <td>Rp. {{ number_format($order['total_price'] + $ppn, 0, '.',',') }}</td>
                    {{-- mengambil column dari relasi, $variable['namaFunctionModel'] --}}
                    {{-- namaColumnDiDBRelasi --}}
                    <td>{{ $order['user']['name']}} <a href="mailto:kasir@gmail.com">(kasir@gmail.com)</a> </td>
                    @php 
                        setLocale(LC_ALL, 'IND');
                    @endphp
                    <td>{{ Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %B %Y') }}</td>
                    <td><a href="{{ route('order.download-pdf', $order['id']) }}" class="btn btn-success">download to pd</a></td>
                </tr>
                @endforeach
                {{-- @foreach ($orders as $order)
                    <!-- Tampilkan hasil pencarian di sini -->
                    <p>{{ $orders->search }} - {{ $order->created_at }}</p>
                @endforeach  --}}
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            @if ($orders->count())
                {{ $orders->links() }}
            @endif
        </div>
    </div>
@endsection