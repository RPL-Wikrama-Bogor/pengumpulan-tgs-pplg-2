<div class="container">
    <h1>Daftar Peminjaman</h1>
    <br>
    <br>

    <div class="row">
        <div class="col-lg-8">
            <a href="<?= BASE_URL; ?>/barang/tambah/" class="btn btn-primary">tambah peminjaman</a>
        </div>

            <div class="col-lg-4">
                <form action="<?= BASE_URL; ?>/barang/cari" method="post">
                    <div class="input-group ">
                        <input type="text" class="form-control" placeholder="cari data" name="keyword" id="keyword" autocomplete="off">
                        <button class="btn btn-primary" type="submit" id="tombolcari">cari</button>
                        <button class="btn btn-danger" type="submit" id="tombol">reset</button>
                    </div>
                </form>
            </div>
    </div>

        

            <table class="table table-success table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Peminjam</th>
            <th scope="col">Jenis Barang</th>
            <th scope="col">Nomor Barang</th>
            <th scope="col">Tanggal Pinjaman</th>
            <th scope="col">Tanggal Kembali</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php foreach($data['barang'] as $row) :?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_peminjam']; ?></td>
                <td><?= $row['jenis_barang']; ?></td>
                <td><?= $row['no_barang']; ?></td>
                <td><?= $row['tanggal_pinjam']; ?></td>
                <td><?= $row['tanggal_kembali']; ?></td>
                <td>
                    <?php if ($row['status'] == 'Sudah Kembali'){
                        echo '<div class="btn btn-success text-white">Sudah Kembali</div>';
                    } else {
                    echo '<div class="btn btn-danger text-white">Belum kembali</div>';
                    }
                    ?>
                </td>
                <td>
                    <?php if ($row['status'] == 'Sudah Kembali') : ?>
                    <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="las la-trash"></i></a>
                    <?php else : ?>
                <a href="<?= BASE_URL ?>/barang/edit/<?= $row['id'] ?>" class="btn btn-primary">edit</a>
                <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('hapus data?');">hapus</a>
                <?php endif; ?>
               </td>
            </tr>
            <?php $no++; endforeach; ?>
    </tbody>
    
</table>
</div>