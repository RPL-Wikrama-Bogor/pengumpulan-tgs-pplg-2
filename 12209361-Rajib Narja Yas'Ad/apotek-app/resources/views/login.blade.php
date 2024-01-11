@extends('layout.template')

@section('content')
    <form action="{{ route('auth-login') }}" method="POST" class="card p-4 mt-5">
        @csrf
        @if ($errors->any())
        <ul class="allert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
        {{-- menampilkan massage dari controler with namanya failed --}}
        @if (Session::get('failed'))
        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif
        <div class="mb-row">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control"
            placeholder="masukan email anda...">
        </div>
        <div class="mb-3 mx-1">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" 
            placeholder="masukan password anda...">
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
    </form>
    @endsection