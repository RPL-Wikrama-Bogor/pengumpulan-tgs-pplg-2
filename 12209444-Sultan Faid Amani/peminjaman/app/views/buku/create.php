<div class="container">
    <h3 class="mb-3">Tambah Barang Pinjaman</h3>
    <form action="<?= BASE_URL; ?>/buku/simpanbuku" method="post">
    <div class="class-body">
        <div class="form-group mb-3">
            <label for="nama_peminjam">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam">
        </div>
        <div class="form-group mb-3">
            <label for="jenis_barang">Jenis Barang</label>
             <select name="jenis_barang" class="form-control"  require>
                <option value="" selected hidden disabled>Pilih</option>
                <option value="Laptop">Laptop</option>
                <option value="HP">HP</option>
                <option value="adapterLan">Adapter LAN</option>
              </select>
        </div>
        <div class="form-group mb-3">
            <label for="no_barang">No Barang</label>
            <input type="number" class="form-control" id="no_barang" name="no_barang">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
        </div>
    </div>
    <div class="card-footer">
    <button type="submit" class= "btn btn-primary">Submit</button>
    </div>
    </form>
</div>