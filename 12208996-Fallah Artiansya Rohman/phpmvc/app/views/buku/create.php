<div class="container">
    <h3 class="mb-3">Tambah Buku </h3>
    <form action="<?= BASE_URL; ?>/buku/simpanbuku/" method="post">
    <div class="class-body">
        
        <div class="form-group mb-3">
            <label for="nama_peminjam">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam" >
        </div>
        <div class="form-group mb-3" >
            <label for="jenis_barang">jenis barang</label>
        <select name="jenis_barang" id="jenis_barang" class="form-control">
            <option selected hidden>Pilih</option>
            <option value="Laptop">Laptop</option>
            <option value="HP">HP</option>
            <option value="Adaptor LAN">Adaptor LAN</option>
        </select>
        </div>
        <div class="form-group mb-3">
            <label for="nomer_barang">Nomer Barang</label>
            <input type="text" class="form-control" id="nomer_barang" name="nomer_barang" >
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" >
        </div>
        <div class="form-group mb-3">
            <label for="tgl_kembali">Tanggal Kembali</label>
            <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" >
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
</div>