<div class="container">

    <h3 class="mb-3">Edit Peminjaman : <?= $data['buku']['nama_peminjam'] ?></h3>
    <form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">

        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['buku']['id'] ?>">

            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['buku']['nama_peminjam'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang</label>
                <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" value="<?= $data['buku']['jenis_barang'] ?>">
            </div>

            
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang</label>
                <input type="text" class="form-control" id="no_barang" name="no_barang" value="<?= $data['buku']['no_barang'] ?>">
            </div>

            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="date" class="form-control" name="tgl_pinjam" ?>
            </div>

            <div class="form-group mb-3">
                <label for="no_barang">Tanggal Kembali</label>
                <input type="date" class="form-control" name="tgl_kembali" ?>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>