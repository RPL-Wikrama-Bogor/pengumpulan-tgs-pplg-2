<div class="container">
    <h3 class="mb-3">Edit Buku : <?= $data['buku']['nama_peminjam'] ?></h3>
    <form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['buku']['id']; ?>">
            <div class="form-group mb-3">
                <label for="judul">Nama Peminjam</label>
                    <input type="text" class="form-control" id="judul" name="nama_peminjam" value="<?= $data['buku']['nama_peminjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="penulis">Jenis Barang</label>
                    <input type="text" class="form-control" id="penulis" name="jenis_barang" value="<?= $data['buku']['jenis_barang'] ?>">
        </div>
        <div class="form-group mb-3">
                <label for="tgl_selesai">Nomor barang</label>
                    <input type="text" class="form-control" id="no_barang" name="no_barang" value="<?= $data['buku']['no_barang'] ?>">
       </div>
        <div class="form-group mb-3">
                <label for="tgl_selesai">Tanggal Pinjam</label>
                    <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['buku']['tgl_pinjam'] ?>">
       </div>
        <div class="form-group mb-3">
                <label for="tgl_selesai">Tanggal Kembali</label>
                    <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="">
       </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>