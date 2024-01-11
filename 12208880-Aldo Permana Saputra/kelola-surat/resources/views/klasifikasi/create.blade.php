@extends('layouts.template')

@section('content')
    <div class="main ml-5">
        <h1 class="">Tambah Data Klasifikasi Surat</h1>

        <div class="">

            <form action="{{ route('klasifikasi.store') }}" method="POST">

                @csrf

                <div class="mb-3 row">
                    <label for="letter_code" class="col-sm-5 col-form-label">Kode Surat: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="letter_code" name="letter_code">
                    </div>
                </div>


                <div class="mb-3 row">
                    <label for="name_type" class="col-sm-5 col-form-label">Klasifikasi Surat: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_type" name="name_type">
                    </div>
                </div>


                <button type="submit" class="btn btn-primary mt-3">Tambah Data</button>
                
            </form>
        </div>

    </div>
@endsection



@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection