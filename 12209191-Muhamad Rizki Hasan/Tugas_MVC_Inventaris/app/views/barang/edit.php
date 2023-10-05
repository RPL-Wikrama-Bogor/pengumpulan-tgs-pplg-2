<div class="container">
    <h3 class="mb-3">Edit Peminjaman</h3>
    <form action="<?= BASE_URL; ?>/barang/updateBarang" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['barang']['id']; ?>">
            <div class="form-group mb-3">
                <label for="nama_peminjam">Nama Peminjam</label>
                <input class="form-control" type="text" name="nama_peminjam" id="nama_peminjam" value="<?= $data['barang']['nama_peminjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <select name="jenis_barang" id="jenis_barang" class="form-control" >
                    <label for="jenis_barang">Jenis Barang</label>
                    <option selected><?= $data['barang']['jenis_barang'] ?></option>
                    <option value="HP">HP</option>
                    <option value="Laptop">Laptop</option>
                    <option value="AdaptorLAN">Adaptor LAN</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">No Barang</label>
                <input class="form-control" type="number" name="no_barang" id="no_barang" value="<?= $data['barang']['no_barang'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input class="form-control" type="datetime-local" name="tgl_pinjam" id="tgl_pinjam" value="<?= $data['barang']['tgl_pinjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_kembali">Tanggal Kembali</label>
                <input class="form-control" type="datetime-local" name="tgl_kembali" id="tgl_kembali">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" name="submit">Ubah Data</button>
        </div>
    </form>
</div>
<script>
    document.getElementById("tgl_kembali").addEventListener("change", function() {
        let tglPinjam = new Date(document.getElementById("tgl_pinjam").value);
        let tglKembali = new Date(this.value);

        if (tglKembali < tglPinjam) {
            alert("Tanggal pinjam tidak boleh lebih besar dari tanggal kembali");
            this.value = "";
        }
    });
</script>