@extends ('layouts.template')

@section('content')
        <div class="container mt-3">
            <div class="row">
                <div class="col-6" style="margin-top 1 rem">
                    <form action="{{ route('order.search') }}" method="GET">
                    <div class="input-group">
                        <input type="date" class="form-control" name="search" id="" style="margin-right: 1rem">
                        <button class="btn btn-primary" type="submit">cari</button>
                        <a href="{{route('order.index')}}" class="btn btn-secondary">Reset</a>
                      </div>
                    </form>
                </div>
            </div>
        </div>
     <div>
    </form>        
     <form action="" method="POST" class="card bg-light mt-5 p-5">
        <div class="d-flex justify-content-end">
            <a href="{{ route('order.create') }}" class="btn btn-primary">Tambah Pembelian</a>
        </div>
        <table class="table-striped w-100 table mt-3">
            <thead>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Pesanan</th>
                <th>Total Bayar</th>
                <th>Kasir</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                {{-- --currentpage: ambil posisi ada dipage keberapa -1 () --}}
                {{-- @php $no = 1; @endphp --}}
                <td>{{ ($orders->currentpage()-1) * $orders->perpage()+$loop->index+1}}</td>
                <td> {{ $order['nama_customer'] }} </td>
                <td>
                    <ol>
                        @foreach ($order['medicines'] as $medicine)
                        <li>
                            {{ $medicine['name_medicine'] }} <small>RP. {{ number_format($medicine['price']), 0,',',
                                '.' }} <b>(qty : {{ $medicine['qty'] }}) </b></small> = Rp. {{ number_format($medicine
                                    ['price_after_qty'],0,',','.') }}</li>
                        @endforeach
                    </ol>
                </td>
                @php
                $ppn = $order['total_price'] * 0.1;
                @endphp
                <td> Rp. {{ number_format(($order['total_price']+$ppn), 0,',','.') }}</td>
                <td>{{ $order['user']['name'] }} <a href="mailto:{{ $order['user']['email']}}">{{ $order['user']['email']}} </a></td>
                @php
                setLocale(LC_ALL, 'IND');
                @endphp
                <td>{{ Carbon\Carbon::parse($order['created_at']) ->formatLocalized('%d %B %Y') }}</td>
                <td><a href="{{ route('order.download-pdf', $order['id'])}}" class="btn btn-success">Download to pdf</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
         {{-- pagination --}}
         @foreach (
            $orders as $order)
            @endforeach
         {{ $orders->links() }}
    </form>
</div>
@endsection