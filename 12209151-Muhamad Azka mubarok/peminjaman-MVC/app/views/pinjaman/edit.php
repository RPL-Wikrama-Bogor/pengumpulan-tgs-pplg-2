<div class="container">
    <h3 class="mb-3">Edit Buku: <?= $data['pinjaman']['nama_peminjam'] ?></h3> 
    <form action="<?= BASE_URL; ?>/pinjaman/updatePinjaman" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['pinjaman']['id']; ?>">
            <div class="form-group mb-3">
                <label for="nama_peminjam ">Nama Peminjam</label>
                <input type="text" class="form-control" id="pinjaman" name="nama_peminjam" value="<?= $data['pinjaman']['nama_peminjam'] ?>"> 
            </div>
            <div class="form-group mb-3">
                <label for="jenis_barang">Jenis Barang </label>
                <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" value="<?= $data['pinjaman']['jenis_barang'] ?>"> 
            </div>
            <div class="form-group mb-3">
                <label for="no_barang">Nomor Barang </label>
                <input type="text" class="form-control" id="no_barang" name="no_barang" value="<?= $data['pinjaman']['no_barang'] ?>"> 
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam ">Tanggal Pinjam</label>
                <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?= $data['pinjaman']['tgl_pinjam'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_pinjam ">Tanggal Kembali</label>
                <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $data['pinjaman']['tgl_kembali'] ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div> 
        <script>
    const tglPinjamInput = document.getElementById('tgl_pinjam');
    const tglKembaliInput = document.getElementById('tgl_kembali');

    tglPinjamInput.addEventListener('change', function() {
        tglKembaliInput.min = tglPinjamInput.value;
    });

    tglKembaliInput.addEventListener('change', function() {
        if (tglKembaliInput.value < tglPinjamInput.value) {
            alert('Tanggal kembali tidak boleh kurang dari tanggal pinjam.');
            tglKembaliInput.value = tglPinjamInput.value;
        }
    });
</script>
    </form>
</div>