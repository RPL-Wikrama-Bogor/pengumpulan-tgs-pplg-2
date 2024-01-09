<div class="container">
<h3 class="mb-3">edit barang:<?= $data['buku']['nama_peminjaman'] ?></h3>
    <form action="<?= BASE_URL; ?>/buku/updatebuku" method="post">
    <div class="class-body">
        <input type="hidden" name="id" value="<?=$data['buku']['id'] ?>">
        <div class="form-group mb-3">
            <label for="nama_peminjaman">nama peminjaman</label>
            <input type="text" class="form-control" id="nama_peminjaman" name="nama_peminjaman" value="<?=$data['buku']['nama_peminjaman'] ?>">
        </div>
        <div class="form-group mb-3">
        <label for="jenis_berang">Jenis Barang</label>
        <select class="form-control" id="jenis_berang" name="jenis_berang" value="<?=$data['buku']['jenis_berang'] ?>">
        <option value="">Pilih jenis barang</option>
        <option value="laptop">laptop</option>
        <option value="hp">hp</option>
        <option value="adaptoplan">adaptorlan</option>
          </select>
        </div>
        <div class="form-group mb-3">
            <label for="no_barang">no barang</label>
            <input type="number" class="form-control" id="no_barang" name="no_barang" value="<?=$data['buku']['no_barang'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_pinjam">tangal pinjam</label>
            <input type="datetime-local" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="<?=$data['buku']['tgl_pinjam'] ?>">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_kembali">tanggal kembali</label>
            <input type="datetime-local" class="form-control" id="tgl_kembali" name="tgl_kembali" value="">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>  
</form>
</div>