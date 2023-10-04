<div class="container">
    <h3 class="mb=3">Edit Pinjaman : <?= $data['barang']['nama_peminjaman'] ?></h3>
    <form action="<?= BASE_URL; ?>/pinjam/updatePinjaman" method="post">
    <div class="class-body">
        <input type="hidden" name="id" value="<?= $data['barang']['id']; ?>">
        <div class="form-group mb-3" >
            <label for="nama_peminjaman">nama peminjam</label>
            <input type="text" class="form-control" name="nama_peminjaman" id="nama_peminjaman" value="<?= $data['barang']['nama_peminjaman'] ?>">
        </div>
        <div class="form-group mb-3" >
            <label for="jenis_barang">jenis barang</label>
        <select name="jenis_barang" id="jenis_barang" class="form-control">
            <option selected hidden ><?= $data['barang']['jenis_barang']; ?></option>
            <option value="Laptop">Laptop</option>
            <option value="HP">HP</option>
            <option value="Adaptor LAN">Adaptor LAN</option>
        </select>
        </div>
        <div class="form-group mb-3" >
            <label for="no_barang">no barang</label>
            <input type="number" class="form-control" name="no_barang" id="no_barang" value="<?= $data['barang']['no_barang'] ?>">
        </div>
        <div class="form-group mb-3" >
            <label for="tgl_pinjam">tgl pinjam</label>
            <input type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="<?= $data['barang']['tgl_pinjam'] ?>">
        </div>
        <div class="form-group mb-3" >
            <label for="tgl_kembali">tgl kembali</label>
            <input type="datetime-local" class="form-control" name="tgl_kembali" id="tgl_kembali">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>

<script>
    document.getElementById("tgl_kembali").addEventListener("change", function() {
        var tglPinjam = new Date(document.getElementById("tgl_pinjam").value);
        var tglKembali = new Date(this.value);

        if (tglKembali < tglPinjam) {
            alert("Tanggal kembali tidak boleh lebih kecil dari tanggal pinjam. Silakan pilih tanggal kembali yang valid.");
            this.value = "";
        }
    });
</script>
