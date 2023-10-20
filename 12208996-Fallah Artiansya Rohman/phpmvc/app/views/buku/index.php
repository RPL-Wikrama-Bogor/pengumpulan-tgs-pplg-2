<div class="container">

    <h3 class="mb-3">Daftar Buku</h3>
    <div class="d-flex justify-content-between">
        <div>
            <a href="<?= BASE_URL; ?>/buku/tambah" class="btn btn-primary">Tambah Peminjaman</a>

        </div>
        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/buku/cari" method="post" class="d-flex">

                <input type="text" name="keyword" class="form-control" id="keyword" placeholder="cari buku...">
                <button type="submit" class="btn btn-success">Cari</button>

            </form>
            <a href="<?= BASE_URL; ?>/buku/index" class="btn btn-secondary">Reset</a>

        </div>
    </div>
    <br>
    <br>
    <table class="table table-success table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">nama peminjam</th>
                <th scope="col">jenis barang</th>
                <th scope="col">no barang</th>
                <th scope="col">tanggal pinjam</th>
                <th scope="col">tanggal kembali</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['buku'] as $row) : ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_peminjam']; ?>
                    <td><?= $row['jenis_barang']; ?>
                    <td><?= $row['nomer_barang']; ?>
                    <td><?= $row['tgl_pinjam']; ?>
                    <td><?= $row['tgl_kembali']; ?>
                    <td><?= $row['Action']; ?>
                    </td>
                    <td>
                        <a href="<?= BASE_URL ?>/buku/edit/<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                    </td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>