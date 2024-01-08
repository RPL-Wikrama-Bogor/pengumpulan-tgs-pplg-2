@extends('layouts.template')

@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.order.download-excel') }}" class="btn btn-success">⏫ Export Excel</a>
    </div>

    <div class="mt-3 d-flex">
        <form action="{{ route('admin.order.searchAdmin') }}" method="get">
            <div class="input-group mb-3" style="width: 400px; margin-top: -3rem;">
                <input type="date" class="form-control" name="search">
                <div class="input-group-append" style="margin-left:1rem;">
                    <button class="btn block btn btn-primary" type="submit">Search 🔍</button>
                    <a href="{{  route('admin.order.data')  }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>
    </div>
    
        <table class="table-striped table-bordered w-100 table mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Obat</th>
                    <th>Harga</th>
                    <th>Kasir</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                
                    @foreach ( $orders as $order )
                    {{-- current : ambil posisi ada di page keberapa - (misal udh di klik next lagi ada di page 2 berarti jadi 2-1 = 1) 
                         perpage : mengambil jumlah data yg ditampilkan per page nya berapa (ada di controller bagian paginate/simplePaginate,
                         nilai 5), loop-> index : mengambil index dari array(mulai dari 0)
                          --}}
                    <tr>
                        <th>{{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1 }}</th>
                        <td>{{ $order['name_customer'] }}</td>
                        {{-- nested loop: --}}
                        {{--  --}}
                        <td>
                            <ol>
                                @foreach ($order['medicines'] as $medicine)
                                {{-- tampilan yang ingin ditampilkan  --}}
                                {{-- 1. nama obat Rp.1.000 (qty 2) = Rp. 2.000 --}}
                                    <li> {{ $medicine['name_medicine'] }} <small>Rp. {{ number_format($medicine['price'],
                                    0,'.', '.') }} <b>(qty : {{ $medicine['qty'] }})</b></small> = Rp. {{ 
                                    number_format($medicine['price_after_qty'], 0, ',', '.') }}</li>
                                @endforeach
                            </ol>
                        </td>
                        @php
                            $ppn = $order['total_price'] * 0.1;
                        @endphp
                        <td>Rp. {{ number_format(($order['total_price']+$ppn), 0, ',', '.') }}</td>
                        <td>{{ $order['user']['name'] }} <a href="mailto:{{ $order['user']['email'] }}">( {{ $order['user']['email'] }} )</a>

                        </td>
                        @php
                            // set lokasi waktu berdasrkan penamaan dan jam WIB Indonesia
                            setLocale(LC_ALL, 'IND');
                        @endphp
                        {{-- carbon : package bawaan laravel untuk memanipulasi format tanggal/waktu --}}
                            <td>{{ Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %B %Y') }}</td>
                    
                        </tr>
                    @endforeach         
                    
                    
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                @if ($orders->count())
                    {{ $orders->Links() }}
                @endif
            </div>
    </div>
@endsection