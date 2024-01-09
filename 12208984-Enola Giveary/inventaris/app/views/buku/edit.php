<div class="container">
    <h3 class="mb-3">Edit Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">
    <div class="class-body">
        <input type="hidden " name="id" value="<?= $data['buku']['id'];?>">
        <div class="form-group mb-3">
            <label for="judul">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['buku']['nama_peminjam'] ?>">
        </div>
        <div class="form-group mb-3">
                <label for="judul">Jenis Barang</label>
                <select name="jenis_barang" class="form-select" aria-label="Default select example">
                    <option disable hidden selected><?= $data['buku']['jenis_barang'] ?></option>
                    <option value="Laptop">Laptop</option>
                    <option value="HP">HP</option>
                    <option value="Adaptor LAN">Adaptor LAN</option>
                </select>
            </div>
        <div class="form-group mb-3">
            <label for="judul">Nomor Barang</label>
            <input type="text" class="form-control" id="no_barang" name="no_barang" value="<?= $data['buku']['no_barang'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="judul">Tanggal Peminjaman</label>
            <input type="datetime" class="form-control" name="tgl_pinjam" value="<?= $data['buku']['tgl_pinjam'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="judul">Tanggal Selesai</label>
            <input type="datetime-local" class="form-control" name="tgl_kembali" >
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>