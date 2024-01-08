@extends('layout.template')

@section('content')
<table class="table table-stripped tabble bordered table-hovered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Stock</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody> 
        @php $no = 1; @endphp
        @foreach ($medicines as $item)
        <tr>
            <td>{{ $no++}}</td>
            <td>{{$item['name']}}</td>
            <td style="{{ $item['stock'] <= 3 ? 'background: red; color: white' : 'background: none; color: black'}}">{{ $item['stock'] }}</td>
            <td>
                <div class="btn btn-primary" onclick="edit({{$item['id']}})">Tambah Stock</div>
            </td>
        </tr>
        @endforeach
   </tbody>
</table>        
        <!-- Modal -->
        <div class="modal fade" id="tambah-stock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Stock</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="form-stock">
                    <div class="modal-body">
                        <div id="msg"></div>
                        <input type="hidden" name="id" id="id">
                        <div>
                            <label for="name">Nama Obat :</label>
                            <input type="text" name="name" id="name" class="form-control" disabled>
                        </div>
                        <div>
                            <label for="name">Stock : </label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            @if ($medicines->count())
                {{ $medicines->links() }}
            @endif
        </div>
    @endsection

    {{-- pagnation --}}
    {{-- <div class="d-flex justify-content-end">
        @if ($medicines->count())
            {{ $medicines->links() }}
        @endif
    </div> --}}

    @push('script')
    <script>
        // csrf tokken versi js
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        function edit(id) {
            // panggil route dr web.php yang akan menangani proses ambil satu data
            let url = "{{ route('medicine.show', 'id')}}";
            // ganti bagian 'id di url nya jadi data dari parameter id di function nya'
            url = url.replace('id', id);

            // pengambilan data dari FE ke Be dijembatani oleh jquery ajax
            $.ajax({
                // route nya pake method :: apa
                type: 'GET',
                // link route nya dari let url
                url: url,
                // data yang dihasilin bentuknya json
                contentType: 'json',
                // kalau proses ambil data berhasil, ambil data yang dikirim BE lewat parameter res
                success: function (res) {
                    // munculkan modal yg id nya tambah-stock
                    $("#tambah-stock").modal("show");
                    // isi value input dari hasil response BE
                    $("#name").val(res.name);
                    $("#stock").val(res.stock);
                    $("#id").val(res.id);
                }
            })
        }

        $("form-stock").submit(function (e) {

            e.preventDefault();

            let id = $('#id').val();

            let url = {{ route('medicine.stock.update', "id",)}};
            url.replace('id', id);

            let data = {
                stock: $('#stock').val(),
            }
        }

        $.ajax({
            type: "PATCH",
            url: url,
            data : data,
            chache: false,
            success: function (res) {
                // jika berhasil modal di hide
                $.("#edit-stock").modal("hide");
                // buat session js bernama 'successUpdateStock'
                sessionStorage.successUpdateStock = true;
                window.location.reload();
            }
            error: function (err) {
                // kalau terjadi error pada element id="msg" tambah class dengan value allert allert danger
                $("#msg").attr("class", "alert alert-danger")
                // isi text element id ="msg" diambil dari responsejson bagian massage
                $("#msg").text(err.resonseJSON.massage); 
            }
        })
    });
    // function tanpa nama akan dijalankan ketika web baru selesai loading
    $(function () {
        if (sessionStorage.successUpdateStock) {
            $("msg-success").attr("class", "alert alert-success");
            $("msg-success").textr("berhasil mengubah stock");
            // hapus kembali data session setelah allert success dimunculkan
            sessionStorage.clear();
        }
    });

    </script>
@endpush