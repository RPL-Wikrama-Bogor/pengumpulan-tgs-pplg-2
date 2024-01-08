@extends('layouts.appv2')

@section('title', 'Dashboard')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Dashboard</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item d-none"><a href="#">...</a></li>
                            <li class="breadcrumb-item text-subtitle text-muted" aria-current="page">
                                Beranda
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-sm-8">
              @include('components.counter', ['title' => 'Surat Keluar', 'total' => $letters, 'icon' => 'bi bi-newspaper'])          
            </div>
        </div>
    </div>
@endsection
