<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/buku/simpanBuku" method="post">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="judul">Nama Peminjam</label>
                    <input type="text" class="form-control" id="judul" name="nama_peminjam">
            </div>
            <div class="form-group mb-3">
                <label for="judul">Jenis Barang</label>
                    <input type="text" class="form-control" id="penulis" name="jenis_barang">
        </div>
        <div class="form-group mb-3">
                <label for="judul">Nomor Barang</label>
                    <input type="text" class="form-control" id="nomor_barang" name="no_barang">
       </div>
        <div class="form-group mb-3">
                <label for="judul">Tanggal Pinjam</label>
                    <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
       </div>
       <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
       </div>
    </form>
</div>