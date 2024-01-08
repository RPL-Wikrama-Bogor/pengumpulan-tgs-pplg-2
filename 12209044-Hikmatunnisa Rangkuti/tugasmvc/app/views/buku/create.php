<div class="container">
<h3 class="mb-3">Tambah Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/buku/simpanbuku/" method="post">
    <div class="class-body">
        <div class="class-body">
        <div class="form-group mb-3">
            <label for="nama_peminjaman">Nama Peminjam</label>
            <input type="text" class="form-control" id="nama_peminjaman" name="nama_peminjaman">
        </div>
        <label for="jenis_berang">Jenis Barang</label>
        <div class="form-group mb-3">
        <select class="form-control" id="jenis_berang" name="jenis_berang">
        <option selected>Pilih jenis barang</option>
        <option value="laptop">laptop</option>
        <option value="hp">hp</option>
        <option value="adaptoplan">adaptorlan</option>
          </select>
        </div>
        <div class="form-group mb-3">
            <label for="no_barang">No Barang</label>
            <input type="number" class="form-control" id="no_barang" name="no_barang">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" >
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>  
</form>
</div>