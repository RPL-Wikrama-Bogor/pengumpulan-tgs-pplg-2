<div class="container">
    <h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/barang/simpanBarang" method="POST">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input class="form-control" type="text" name="nama_peminjam" id="nama_peminjam">
            </div>
            <div class="form-group mb-3">
                <select name="jenis_barang" id="jenis_barang" class="form-control">
                    <label for="jenis_barang">Jenis Barang</label>
                    <option selected hidden>Pilih</option>
                    <option value="HP">HP</option>
                    <option value="Laptop">Laptop</option>
                    <option value="AdaptorLAN">Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">No Barang</label>
                <input class="form-control" type="number" name="no_barang" id="no_barang">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input class="form-control" type="datetime-local" name="tgl_pinjam" id="tgl_pinjam">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
        <!-- <div id="error-alert" class="alert alert-danger d-none"></div> -->
    </form>
</div>