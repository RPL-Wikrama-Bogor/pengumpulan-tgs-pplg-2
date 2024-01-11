<div class="container">
    <h3 class="mb=3">Tambah Pinjaman : </h3>
    <form action="<?= BASE_URL; ?>/pinjam/simpanbarang" method="post">
    <div class="class-body">
        <input type="hidden" name="id" value="">
        <div class="form-group mb-3" >
            <label for="nama_peminjaman">nama peminjam</label>
            <input type="text" class="form-control" name="nama_peminjaman" id="nama_peminjaman" value="">
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
        <div class="form-group mb-3" >
            <label for="no_barang">no barang</label>
            <input type="number" class="form-control" name="no_barang" id="no_barang" value="">
        </div>
        <div class="form-group mb-3" >
            <label for="tgl_pinjam">tgl pinjam</label>
            <input type="datetime-local" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>