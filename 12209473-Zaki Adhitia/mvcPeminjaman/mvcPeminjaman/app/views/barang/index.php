<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>
    <a href="<?= BASE_URL; ?>/barang/tambah" class="btn btn-primary">Tambah Peminjam</a>
    <div class="d-flex" style="float: right; gap: 0.5rem;">
            <form action="<?= BASE_URL; ?>/barang/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="keyword" placeholder="Cari Peminjam">
                <button type="submit" class="btn btn-outline-success">Cari</button>
            </form>
        <a href="<?= BASE_URL; ?>/buku/index" class="btn btn-outline-danger">Reset</a>
        </div>
    <br><br>
    <table class="table table-succes table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
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
            <?php foreach ($data['barang'] as $row) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_peminjam']; ?></td>
                <td><?= $row['jenis_barang']; ?></td>
                <td><?= $row['no_barang']; ?></td>
                <td><?= $row['tgl_pinjam']; ?></td>
                <td><?= $row['tgl_kembali']; ?></td>
                <td>
                    <?php 

                        $tgl_pinjam = strtotime($row['tgl_pinjam']);
                        $tgl_kembali = strtotime($row['tgl_kembali']);

                        $timeDifference = $tgl_kembali - $tgl_pinjam;

                        $daysDifference = floor($timeDifference / (60 * 60 * 24));

                        if($row['status'] == 'Sudah Kembali' || $daysDifference >= 2){
                            echo "<button class='btn btn-success'>Sudah Kembali</button>";
                        } else{
                            echo "<button class='btn btn-danger'>Belum Kembali</button>";
                        }
                    ?>
                </td>
                <td>
                <?php if ($row['status'] == 'Sudah Kembali') : ?>
                        <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Anda Menghapus data?');">Hapus</i></a>
                        <?php else : ?>
                        <a href="<?= BASE_URL ?>/barang/edit/<?= $row['id'] ?>" class="btn btn-primary">Edit</i></a>
                        <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin Anda Akan Menghapus data?');">Hapus</i></a>
                        <?php endif; ?>
                    
                </td>
            </tr>
            

            <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>