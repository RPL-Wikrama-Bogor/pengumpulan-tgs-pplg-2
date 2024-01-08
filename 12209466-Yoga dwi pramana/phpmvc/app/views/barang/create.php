<div class="container">
    <h3 class="mb-3">Tambah Barang</h3>
    <form action="<?= BASE_URL ?>barang/simpanbarang" method="post">
        <div class="class-body">
            <div class="form-group mb-3">
                <label for="nama_peminjaman" >Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjaman" name="nama_peminjam" autocomplete="off">
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">jenis Barang</label>
               <select name="jenis_barang" id="jenis_barang" class="form-control" required>
               <option hidden>--Pilih Barang--</option>
               <option value="Laptop">laptop</option>
               <option value="Hp">Hp</option>
               <option value="Adaptor Lan">Adaptor Lan</option>
               </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang</label>
                <input type="text" class="form-control" id="no_barang" name="no_barang">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </div>
    </form>
</div>