@extends('layouts.template')

@section('content')
    <form action="{{ route('auth-login') }}" method="POST" class="card p-4 mt-5">

        @csrf

        @if ($errors -> any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {{-- menampilkan masssage dari controller with nama nya failed --}}

        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif

        <div class="mb-3 row">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" placeholder="Masukan email anda...">
        </div>

        <div class="mb-3 row">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukan password disini...">
        </div>

        <button type="submit" class="btn btn-primary btn-lg btn-block" > Login </button>
    </form>
@endsection