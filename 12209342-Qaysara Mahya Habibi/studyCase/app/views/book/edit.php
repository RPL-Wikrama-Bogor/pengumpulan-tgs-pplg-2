<div class="container">
    <h3 class="mb-3">Edit Peminjaman : <?= $data['buku']['nama_peminjam']?></h3>
    <form action="<?= BASE_URL; ?>/book/updateBuku" method="post">
        <div class="class-body">
        <input type="hidden" name="id" value="<?=$data['buku']['id']?>">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" value="<?= $data['buku']['nama_peminjam']?>">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang</label>
                <select name="jenis_barang" id="jenis_barang" class="form-control" required>
                    <option value="jenis"><?= $data['buku']['jenis_barang']?></option>
                    <option value="Laptop">Laptop</option>
                    <option value="HP">HP</option>
                    <option value="Adaptor LAN">Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">No Barang</label>
                <input type="text" class="form-control" id="no_barang" name="no_barang" value="<?= $data['buku']['no_barang']?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['buku']['tgl_pinjam']?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>