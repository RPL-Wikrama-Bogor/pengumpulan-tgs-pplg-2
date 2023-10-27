<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>
    <a href="<?= BASE_URL; ?>/book/tambah" class="btn btn-primary">Tambah Peminjaman</a>
    <div class="col-lg-4" >
        <form action="<?= BASE_URL; ?>/book/cari" method="post">
            <div class="input-group ">
                <input type="text" class="form-control" placeholder="Cari Data" name="keyword" id="keyword"
                    autocomplete="off">
                <button class="btn btn-primary" type="submit" id="tombolcari">CARI</button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <table class="table table-succes table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">No barang</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['buku'] as $row): ?>
                <tr>
                    <td>
                        <?= $no; ?>
                    </td>
                    <td>
                        <?= $row['nama_peminjam']; ?>
                    </td>
                    <td>
                        <?= $row['jenis_barang']; ?>
                    </td>
                    <td>
                        <?= $row['no_barang']; ?>
                    </td>
                    <td>
                        <?= $row['tgl_pinjam']; ?>
                    </td>
                    <td>
                        <?= $row['tgl_kembali']; ?>
                    </td>
                    <td>
                        <?php if ($row['status'] == 'Sudah Kembali') {
                            echo '<div class="btn btn-success text-white">Sudah Kembali</div>';
                        } else {
                            echo '<div class="btn btn-danger text-white">Belum Kembali</div>';
                        } ?>
                    </td>
                    <td>
                        <a href="<?= BASE_URL ?>/book/edit/<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= BASE_URL ?>/book/hapus/<?= $row['id'] ?>" class="btn btn-danger"
                            onclick="return confirm('Hapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php $no++; endforeach; ?>
        </tbody>
    </table>
</div>