@extends('layouts.template')

@section('content')

<div class="jumbotron p-4 bg-light mt-5">
    <div class="container">
        @if (Session::get('failed'))
        <div class="alert alert-danger">
        {{Session::get ('failed')}}
        @endif
        </div>
        <h1 class="display-4">Apotek App</h1>
        {{-- mengambil data dari table users sesuai data login --}}
        <h5>selamat datang, {{ Auth::user()->name}}</h5>
        <p class="lead ">Aplikasi manajemen untuk pekerja administrator apotek. Digunakan untuk admin logistik dan kasir</p>
    </div>
</div>

@endsection