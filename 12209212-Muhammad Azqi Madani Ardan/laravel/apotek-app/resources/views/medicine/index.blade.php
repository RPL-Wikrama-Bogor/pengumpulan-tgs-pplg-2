{{-- memanggil file template --}}
@extends('layouts.template')

{{-- isi bagian yield --}}
@section('content')
@if (Session::get('success'))
<br>
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@if (Session::get('deleted')
)
<br>
<div class="alert alert-success">
    {{Session::get('deleted')}}
</div>
@endif
<table class="table mt-5 table-striped table-bordered table-hovered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach ($medicines as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['type']}}</td>
            <td>{{$item['price']}}</td>
            <td>{{$item['stock']}}</td>
            <td class="d-flex">
                <a href="{{route('medicine.edit', $item['id'])}}" class="btn btn-success">Edit</a>
                {{-- method delete tidak bisa digunakan di href harus pakai form --}}
                <form action="{{route('medicine.delete', $item['id'])}}" method="post" class="ms-3">
                @csrf
                {{-- Menimpa atau mengubahj method post menjadi method DELETE sesuai dengan method route(::delete) --}}
                @method('DELETE')
                <button type="submit" class="btn btn-danger" >Hapus</button>

                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
    
</table>
<div class="d-flex justify-content-end
">
@if ($medicines->count())
{{$medicines->links()}}
@endif
</div>
@endsection