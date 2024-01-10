@extends ('layouts.template')

@section('content')
<div class="mt-5">
    <form action="{{route('admin.order.searchAdmin')}}" method="GET">
        <input type="date" name="search">
        <button type="success" class="btn btn-primary">Cari</button>
        <a href="{{ route('order.index') }}" class="btn btn-secondary">Kembali</a>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.order.downloadExcel') }}" class="btn btn-success">Export Excell</a>
        </div>
        <table class="table mt-5 table-striped table-bordered table-hovered">
            <thead>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Pesanan</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($orders as $order)
                <tr>
                    {{-- nested loop : looping di dalam looping --}}
                {{-- karna column medicines pada table orders tipe datanya json, jadi untuk aksesnya perlu looping --}}
                {{-- currentpage : ambil posisi ada di page keberapa - 1 
                    (misal uda klik next lagi ada di page 2 berarti jadi 2-1 = 1), perpage : mengambil jumlah data yang ditampilkan perpagenya berapa 
                    (ada di controller bagian paginatenya /simplePaginate, misal 5), loop->index : mengambil indes dari array (muali dari 0)+1  --}}
                    <td>{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index +1 }}</td>
                    <td>{{ $order['name_customer'] }}</td>
                    <td>
                        <ol>
                            @foreach ($order['medicines'] as $medicine)
                                <li>{{ $medicine['name_medicine'] }} <small>RP. {{ number_format($medicine['price'],0,'.','.') }} <b>(qty : {{ $medicine['qty'] }})</b></small> = Rp. {{ number_format($medicine['price_after_qty'],0,'.','.') }}</li>
                            @endforeach
                        </ol>
                    </td>
                    @php
                        $ppn = $order['total_price'] * 0.1;
                    @endphp
                    <td>Rp. {{ number_format(($order['total_price']+$ppn),0,'.','.') }}</td>
                    <td>{{ $order['user']['name']}} <a href="mailto:
                        {{ $order['user']['email']}}">{{ $order['user']['email']}}</a></td>
                    @php
                        setlocale(LC_ALL, 'IND');
                    @endphp
                    <td>{{ Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %B %Y') }}</td>
                    <td>
                        <a href="{{ route('order.download-pdf', $order['id']) }}" class="btn btn-success">Cetak</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            @if ($orders->count())
            {{ $orders->links()}}
            @endif
        </div>
    </div>
    </form>
@endsection