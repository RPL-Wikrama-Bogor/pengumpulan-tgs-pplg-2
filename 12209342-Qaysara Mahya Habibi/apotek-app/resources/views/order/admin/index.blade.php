@extends('layouts.template')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.order.searchAdmin') }}" method="GET">
                    <div class="input-group">
                        <input type="date" name="searchAdmin" id="searchAdmin" value="{{ request('searchAdmin') }}"
                            class="form-control">
                        <button type="submit" class="btn btn-primary">Cari Data</button>
                        @if (request('searchAdmin'))
                            <a href="{{ route('admin.order.data') }}" class="btn btn-secondary">Clear</a>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <a href=" {{ route('admin.order.download-excel') }} " class="btn btn-success">Export Excel</a>
            </div>
        </div>
    </div>
    <br>

    <table class="table-striped w-100 table mt-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pembeli</th>
                <th scope="col">Pesanan</th>
                <th scope="col">Total Bayar</th>
                <th scope="col">Kasir</th>
                <th scope="col">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <TR>
                    {{-- currentpage : ambil posisi  ada di page keberapa - 1 (misal uda klik next lg ada di page 2 jadi 2-1 = 1), perpage : mengambil jumlah data yang ditampilkan per page nya berapa (ada di controller bagian paginate/simplePaginate, misal 5), loop->index : mengambil index dari array (mulai dari 0)+1 --}}
                    {{-- jadi : (2+2) x 5 + 1  =6 (dimulai dari angka 6 di page keduanya) --}}
                    <td> {{ ($orders->currentpage() - 1) * $orders->perpage() + $loop->index + 1 }} </td>
                    <td>{{ $order['nama_customer'] }}</td>
                    {{-- nested log : looping di dalam looping --}}
                    {{-- karna column medicines pada table orders tipe dataya json, jd untuk aksesnya perlu looping --}}
                    <td>
                        <ol>
                            @foreach ($order['medicines'] as $medicine)
                                {{-- tampilan yang ingin ditampilkan --}}
                                <li>{{ $medicine['name_medicine'] }} <small> Rp.
                                        {{ number_format($medicine['price'], 0, '.', '.') }} <b>(qty
                                            :{{ $medicine['qty'] }})</b></small> = Rp.
                                    {{ number_format($medicine['price_after_qty'], 0, '.', '.') }} </li>
                            @endforeach
                        </ol>
                    </td>
                    @php
                        $ppn = $order['total_price'] * 0.1;
                    @endphp
                    <td>Rp. {{ number_format($order['total_price'] + $ppn, 0, '.', '.') }} </td>
                    <td>
                        {{-- mengambil column dari relasi, $variable['namaFunctionDiModel']['namaColumnDiDBRelasi']  --}}
                        {{ $order['user']['name'] }}
                        <a href="mailto:{{ $order['user']['email'] }}">({{ $order['user']['email'] }}) </a>
                    </td>
                    @php
                        // set lokasi waktu berdasarkan penamaan dan jam indonesia
                        setLocale(LC_ALL, 'IND');
                    @endphp
                    {{-- carbon / package bawaan laravel untuk memanipulasi format tanggal/waktu --}}
                    <td> {{ Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %B %Y') }} </td>
                </TR>
            @endforeach
        </tbody>
    </table>
    <div class="justify-content-end d-flex">
        @if ($orders->count())
            {{ $orders->links() }}
        @endif
    </div>
    </div>
@endsection
