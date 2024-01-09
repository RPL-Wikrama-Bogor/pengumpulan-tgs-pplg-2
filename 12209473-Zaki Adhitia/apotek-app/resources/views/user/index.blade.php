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

    <table class="table mt-5 table-striped table-bordered table-hovered">

        <thead>

            <a href="{{ route('user.create') }}" class="btn btn-primary mt-5">Tambah Akun</a>

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
                    {{-- <td>{{ $item['password'] }}</td> --}}
                    <td>{{ $item['role'] }}</td>

                    <td class="d-flex">
                        <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-success">Edit</a>

                        {{-- method ::delete tidak bisa digunakan pada a href, harus melalui form action --}}
                        {{-- method ::delete tidak bisa digunakan pada a href, harus melalui form action --}}
                        <button type="submit" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal-{{ $item['id'] }}">
                            <i class="ri-delete-bin-line">Hapus</i>
                        </button>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{ $item['id'] }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <form action="{{ route('user.delete', $item['id']) }}" method="post" class="ms-3">

                                @csrf
                                {{-- meinimpa/mengubah  method="post" agar menjadi method="delete" sesuai dengan method route(::delete) --}}
                                @method('DELETE')
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin ingin hapus data?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    {{-- pagination --}}
    <div class="d-flex justify-content-end">
        @if ($users->count())
            {{ $users->links() }}
        @endif
    </div>
@endsection
