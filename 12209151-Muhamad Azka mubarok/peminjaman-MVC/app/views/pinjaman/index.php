<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>
    <a href="<?= BASE_URL; ?>/pinjaman/tambah" class="btn btn-primary">Tambah Peminjaman</a>
    <div class="d-flex" style="float: right;">
        
        <form action="<?= BASE_URL; ?>/pinjaman/cari" method="post" class="d-flex">
            <input type="text" class="form-control" name="search">
            <button type="submit" class="btn btn-succes">Cari</button>
        </form>
        <a href="<?= BASE_URL; ?>/pinjaman/index" class="btn btn-secondary">reset</a>

    </div>
    <br>
    <br>
    <table class="table table-succes table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">Nomor Barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            <?php foreach ($data['Pinjaman'] as $row) :?>
                <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['nama_peminjam'];?></td>
                        <td><?= $row['jenis_barang'];?></td>
                        <td><?= $row['no_barang'];?></td>
                        <td><?= $row['tgl_pinjam'];?></td>
                        <td><?= $row['tgl_kembali'];?></td>
                        <td>
                        <?php if ($row['status'] == 'Sudah kembali') {
                            echo "<div class='btn btn-success text-white'>Sudah Kembali</div>";
                        }else{
                            echo "<div class='btn btn-danger text-white'>Belum Kembali</div>";
                        }
                        ?>
                        </td>
                        <td>
                        <?php if ($row['status'] == 'Sudah kembali') : ?>
                        <a href="<?= BASE_URL ?>/pinjaman/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Anda Menghapus data?');"><i class="las la-trash"></i></a>
                        <?php else : ?>
                        <a href="<?= BASE_URL ?>/pinjaman/edit/<?= $row['id'] ?>" class="btn btn-primary">Edit<i class="las la-edit"></i></a>
                        <a href="<?= BASE_URL ?>/pinjaman/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Anda Akan Menghapus data?');">Hapus<i class="las la-trash"></i></a>
                        <?php endif; ?>
                        
                        </td>
                </tr>
                <?php $no++; endforeach;?>
        </tbody>
    </table>
</div>

