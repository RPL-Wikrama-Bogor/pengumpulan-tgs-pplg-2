@extends('layouts.template')


@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::get('deleted'))
        <div class="alert alert-warning">
            {{ Session::get('deleted') }}
        </div>
    @endif


    <div class="container">
    <div class="d-flex justify-content-end">
        <a href="{{ route('order.create') }}" class="btn btn-primary mt-5">Tambah Pembelian</a>
    </div>

    <form action="{{ route('order.search') }}" method="get">
        <div class="d-flex" style="margin-top: -2.5rem;">
            <input type="date" name="search" class="form-control" style="width: 300px; margin-right: 1rem;">
            <button type="submit" class="btn btn-primary" name="cari" id="cari">Cari</button> 
            <a href="{{ route('order.index') }}" class="btn btn-danger" style="margin-left: 0.5rem;">Reset</a>
        </div>
    </form>
  
        <table class="table mt-5 table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Pesanan</th>
                    <th>Total Bayar</th>
                    <th>Kasir</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
            </thead>
            <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1 }}</td>
                <th>{{ $order['name_customer'] }}</th>
                <td>
                    <ol>
                        @foreach ($order['medicines'] as $medicine)
                        <li>{{ $medicine['name_medicine'] }}<small>Rp.{{ number_format($medicine['price'],0,'.',',') }}
                            <b>(qty : {{ $medicine['qty'] }})<br></small> = Rp.{{ number_format($medicine['price_after_qty'], 0,'.',',') }}
                            </li>
                            @endforeach
                        </ol>
                    </td>
                    @php 
                    $ppn = $order['total_price'] * 0.1;
                    @endphp
                    <td>Rp.{{ number_format($order['total_price'], 0,'.',',') }}</td>
                    <td>{{ $order['user']['name'] }}<a href="mailto:{{ $order['user']['email'] }}">({{ $order['user']['email'] }})</a></td>
                    @php
                    //
                    setLocale(LC_ALL, 'IND');
                    @endphp
                    {{----}}
                    <td>{{ Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %B %Y') }}</td>
                    <td>
                        <a href="{{ route('order.download-pdf', $order['id'] )}}" class="btn btn-success">Cetak</a>
                    </td>
                </tr>
            </td>
            @endforeach
        </table>
    </tbody>
    </div>
@endsection



{{-- @extends ('layouts.template')

@section('content')
    <form action="" method="POST" class="card bg-light mt-5 p-5">
        <div class="d-flex justify-content-end">
            <a href="#" class="btn btn-secondary">Tambah Pembelian</a>
        </div>
        <table class="table mt-5 table-striped table-bordered table-hovered">
            <thead>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Pesanan</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
                <th>Aksi</th>
            </thead>
        </table>
    </form>
@endsection --}}
