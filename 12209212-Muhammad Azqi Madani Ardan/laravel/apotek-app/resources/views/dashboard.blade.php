@extends ('layouts.template')

@section('content')
<div class="jumbotron p-4 bg-light mt-5">
    <div class="container">
            @if(Session::get('failed'))
            <div class="alert alert-danger">{{Session::get('failed')}}</div>
            @endif
            <h1 class="display-4">Apotek App</h1>
            <h3>Selamat Datang , {{Auth::user()->name}}</h3>
            <p class="lead">Aplikasi manajemen untuk pekerja administrator apotek.DIgunakan untuk admin logistik dan kasir</p>
        </div>
    </div>
@endsection