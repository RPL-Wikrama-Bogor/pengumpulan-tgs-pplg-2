{{--memanggil file template--}}
@extends('layouts.template')

{{--isi bagian yield--}}
@section('content')

    @if(Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if(Session::get('delete'))
        <div class="alert alert-warning">{{ Session::get('delete') }}</div>
    @endif

    <a href="{{  route('user.create')  }}" class="btn btn-secondary" style="float: right; margin-bottom: 10px;">Tambah Pengguna</a>
   <table class="table mt-5 table-striped table-bordered table-hovered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($users as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td class="d-flex">
                    <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary" style="margin-right: 5px;">Edit</a>
                    {{-- method :: delete tidak bisa digunakan pada a href, harus melalui form action --}}
                    
                    <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $item['id'] }}">Hapus</button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal-{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Yakin ingin menghapus data ini?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{ route('user.delete', $item['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
   </table>
   <div class="d-flex justify-content-end">
        @if ($users->count())
            {{ $users->Links() }}
        @endif
   </div>
    
@endsection

