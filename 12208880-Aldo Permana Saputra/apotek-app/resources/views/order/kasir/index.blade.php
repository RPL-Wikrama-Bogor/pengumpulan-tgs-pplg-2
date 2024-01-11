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

    <div class="">
        <form action="{{ route('order.order.search') }}" method="GET">
            @csrf
            <div class=" mt-5 " style="">
                <label for="start_date" class=""><b>Pilih Tanggal:</b></label>
                <input class="" style="border-radius:5px; height: 30px; width:300px; " type="date" name="start_date"
                    id="start_date" required>

                <button type="submit" class="btn btn-primary">Cari</button>
                <a href="{{ route('order.index') }}" class="btn btn-danger"> Reset </a>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('order.create') }}" class="btn btn-primary mt-5">Tambah Pembelian</a>
                    {{-- <a href="{{ route('order.order.search') }}"  class="btn btn-secondary mt-5">Pencarian</a> --}}
                </div>
            </div>


        </form>

        <div class="card bg-light mt-5">
            <table class="table mt-5 table-bordered ">

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


                    @foreach ($orders as $order)
                        <tr>
                            {{--currentpage : ambl posisi ada di page keberapa -1 (misal udah di klik next lago ada di page 2 berarti jadi 2-1 = 1), per page : mengambil jumlah data yang ditampilkan per page nya berapa (ada di controller bagfian paginate/simplePaginate, misal 5), loop->index : mengambil index dari array (mulai dari 0)+1 --}}
                            {{-- jadi : (2-1) x 5 + 1 = 6 (dimulai dari anghka 6 di page ke 2 nya )--}}

                            <td> {{ ($orders->currentpage()-1) * $orders->perpage() + $loop->index + 1  }} </td>
                            <th>{{ $order['name_costumer'] }}</th>
                            {{-- nested loop : looping di dalam loopinh --}}
                            {{-- karna column medicines pada table orders tipe dayanya json, jadi untuk akses nya perlu looping --}}

                            <td>
                                <ol>
                                    @foreach ($order['medicines'] as $medicine)
                                        <li>
                                            {{ $medicine['name_medicine'] }} <small> Rp.
                                                {{ number_format($medicine['price'], 0, '.', ',') }} <b>(qty :
                                                    {{ $medicine['qty'] }})</b> </small> = Rp.
                                            {{ number_format($medicine['price_after_qty'], 0, '.', ',') }}
                                        </li>
                                    @endforeach
                                </ol>
                            </td>

                            @php
                                $ppn = $order['total_price'] * 0.1;
                            @endphp

                            <td>
                                Rp .{{ number_format($order['total_price'] + $ppn, 0, '.', '.') }}
                            </td>
                            {{-- mengambil column dari relasi, $variabel['namaFunctionDiModel'] ['namaColumnDiRelasi'] --}}
                            <td>{{ $order['user']['name'] }} <a href="gmailto:{{ $order['user']['email'] }}">({{ $order['user']['email'] }})</a></td>

                            @php
                                setLocale(LC_ALL, 'IND');
                            @endphp
                            <td>{{ Carbon\Carbon::parse($order['created_at'])->formatLocalized('%d %B %Y') }}</td>

                            
                            <th><a href="{{ route('order.download-pdf', $order['id']) }}" class="btn-print">Cetak (.pdf)</a></th>
                        </tr>
                    @endforeach




                </tbody>



            </table>

        </div>


        <br>
        {{-- pagination --}}
        <div class="d-flex justify-content-end">
            @if ($orders->count())
                {{ $orders->links() }}
            @endif
        </div>
    </div>
@endsection
