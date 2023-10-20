<div class="container">
    <h3 class="mb-3">Edit Buku : <?= $data['buku']['nama_peminjam'] ?></h3>
    <form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">
    <div class="class-body">
        <input type="hidden" name="id" value="<?= $data['buku']['id']; ?>">
        <div class="form-group mb-3">
            <label for="nama peminjam">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['buku']['nama_peminjam'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="jenis barang">Jenis Barang</label>
            <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" value="<?= $data['buku']['jenis_barang'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="nomer barang">Nomor Barang</label>
            <input type="text" class="form-control" id="nomer_barang" name="nomer_barang" value="<?= $data['buku']['nomer_barang'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal pinjam</label>
            <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['buku']['tgl_pinjam'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_kembali">Tanggal Kembali</label>
            <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['buku']['tgl_kembali'] ?>">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>