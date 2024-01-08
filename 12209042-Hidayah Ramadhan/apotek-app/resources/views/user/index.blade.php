@extends('layouts.template')


@section('content') 
@if (Session::get('success'))
    <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::get('deleted'))
        <div class="alert alert-warning">{{Session::get('deleted') }}</div>
    @endif
    <a href="{{ route('user.create') }}" class="btn btn-primary mt-5 ">Tambah User</a>
    <table class="table mt-5table-striped table-bordered table-hovered">

        
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
            @php $no = 1 @endphp
            @foreach ($users as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['email'] }}</td>
                <td>{{ $item['role'] }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('user.edit', $item['id']) }}" 
                    class="btn btn-success">Edit</a>
                    {{--method ::delete tidak bisa digunakan pada a href, harus melalu form
                    action --}}
                    <form action="{{ route('user.delete', $item['id']) }}" method="post" class="ms-3">
                        @csrf
                        {{-- menimpa/mengubah method="post" agar menjadi method="delete sesuai
                        dengan method route --}}
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        @if ($users->count())
            {{ $users->links() }}
        @endif
    </div>
@endsection