<div class="container">
    <h3 class="mb-3">Edit Barang : <?= $data['data']['nama_peminjam'] ?></h3>
    <form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">
    <div class="class-body">
        <input type="hidden" name="id" value="<?= $data['data']['id']; ?>">
        <div class="form-group mb-3">
            <label for="jenis_barang">Jenis Barang</label>
             <select name="jenis_barang" class="form-control" require>
                <option selected hidden disabled ><?= $data['data']['jenis_barang']?></option>
                <option value="Laptop">Laptop</option>
                <option value="HP">HP</option>
                <option value="adapterLan">Adapter LAN</option>
              </select>
        </div>
        <div class="form-group mb-3">
            <label for="no_barang">No Barang</label>
            <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?= $data['data']['no_barang']?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['data']['tgl_pinjam'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal Kembali</label>
            <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali">
        </div>
    </div>
    <div class="card-footer">
    <button type="submit" class= "btn btn-primary">Submit</button>
    </div>
    </form>
</div>