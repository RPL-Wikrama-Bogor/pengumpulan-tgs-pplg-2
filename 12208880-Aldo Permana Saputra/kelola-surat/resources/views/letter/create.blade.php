@extends('layouts.template')

@section('content')
    <div class="container">

        <section class="background" style="background-color: rgb(255, 255, 255); padding:30px;">

            <form action="{{ route('letter.store') }}" method="POST" enctype="multipart/form-data">


                @csrf

                <div class="mb-3 row">

                    <div class="col-6">
                        <label for="letter_perihal" class="col-form-label">Perihal : </label>
                        <div class="">
                            <input type="text" class="form-control" id="letter_perihal" name="letter_perihal">
                        </div>
                    </div>


                    {{-- ================================================================================= --}}




                    <div class="col-6">
                        <label for="letter_type_id" class="col-form-label">Klasifikasi Surat: </label>
                        <select class="form-select" aria-label="Default select example" id="letter_type_id" name="letter_type_id">
                            @foreach ($klasifikasi as $data_klasifikasi)
                                <option value="{{ $data_klasifikasi['id'] }}">
                                    {{ $data_klasifikasi['name_type'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="edit col-11 mt-3">

                        <label for="content" class="col-form-label">Isi Surat: </label>

                        <input id="body" type="hidden" name="content">
                        <trix-editor input="body"></trix-editor>

                    </div>


                    <div class="mt-3">

                        <table class="table table-bordered">

                            <thead>
                                <label for="recipients" class="col-form-label">recipients</label>

                                <tr>
                                    <th class="col-4">Nama</th>
                                    <th class="col-7">Peserta (ceklis jika "ya")</th>
                                </tr>
                            </thead>


                            <tbody>

                                @foreach ($user as $item)
                                    <tr>
                                        <td class="nama-item">
                                            {{ $item->name }}
                                        </td>

                                        <td class="checkbox" style="">
                                                <input type="checkbox" name="recipients[]" value="{{ $item->id }}">
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>


                        </table>

                    </div>


                    <div class="edit col-11 mt-3">
                        <label for="attachment" class="col-form-label">Lampiran: </label>

                        <div class="">
                            <input type="file" class="form-control" id="attachment" name="attachment">
                        </div>
                    </div>



                    <div class="col-6">
                        <label for="notulis" class="col-form-label">Notulis : </label>
                        <select class="form-select" aria-label="Default select example" id="notulis" name="notulis">
                            @foreach ($user as $item)
                                <option value="{{ $item['id']}}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>


                </div>
                <button type="submit" class="btn btn-primary mt-3" style="padding: 5px 120px;">Tambah</button>

            </form>

        </section>

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
