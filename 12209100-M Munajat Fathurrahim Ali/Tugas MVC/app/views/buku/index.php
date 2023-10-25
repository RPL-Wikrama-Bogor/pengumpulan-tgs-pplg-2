<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>
    <div class="d-flexjustify-content-between">
        <a href="<?= BASE_URL; ?>/buku/tambah" class = "btn btn-primary">Tambah Pinjaman</a>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/buku/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="keyword" placeholder="Cari Barang..">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
        <a href="<?= BASE_URL; ?>/buku/index" class="btn btn-secondary">reset</a>
    </div>
    </div>
    <br>
    <br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomor Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            <?php foreach ($data['data'] as $row) :?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_peminjam'];?></td>
                    <td><?= $row['jenis_barang'];?></td>
                    <td><?= $row['no_barang'];?></td>
                    <td><?= $row['tgl_pinjam'];?></td>
                    <td><?= $row['tgl_kembali']?></td>
                   <?php $tglPinjam = strtotime($row['tgl_pinjam']);
                         $tglKembali = strtotime($row['tgl_kembali'])?>
                    <td><?php if ($row['tgl_pinjam'] > $tglKembali) {
                        if ($row['status'] == 'Sudah Kembali') {
                            echo "<p class='btn btn-success'>Sudah Dikembalikan</p>";
                        } else {
                            echo  "<p class='btn btn-danger'>Belum Dikembalikan</p>";
                        }
                     } else {
                                echo  "<p class='btn btn-danger'>Belum Dikembalikan</p>";
                                } ?>
                    
                    </td>
                    <td>
                    <?php 
                if ($tglPinjam < $tglKembali) {
                if ($row['status'] == 'Sudah Kembali') : ?>
                <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="las la-trash"></i>Hapus</a>
                <?php else : ?>
                <a href="<?= BASE_URL ?>/buku/edit/<?= $row['id'] ?>" class="btn btn-primary"><i class="las la-edit"></i>Ubah</a>
                <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="las la-trash"></i>Hapus</a>
                <?php endif; } else { ?>
                    <a href="<?= BASE_URL ?>/buku/edit/<?= $row['id'] ?>" class="btn btn-primary"><i class="las la-edit"></i>Ubah</a>
                    <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="las la-trash"></i>Hapus</a>
                <?php } ?>
                    </td>
                </tr>

                <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>