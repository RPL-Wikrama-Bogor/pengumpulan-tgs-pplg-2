@extends('layouts.template')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"> Dashboard</h1>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
            </ol>
        </div>
        </div>
      </div>
    </div>
  </div>

@section('content')

    <div class="jumbotron p-4 bg-light mt-5">
        <div class="container">

            @if (Session::get('failed'))
                <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                
            @endif

            <h1 class="display-4">
                Apotek App
            </h1>
            <h5> Selamat datang, {{ Auth::user()->name }} </h5>
            <p class="lead">
                Aplikasi manajemen untuk pekerja
            </p>
        </div>
    </div>
    
@endsection