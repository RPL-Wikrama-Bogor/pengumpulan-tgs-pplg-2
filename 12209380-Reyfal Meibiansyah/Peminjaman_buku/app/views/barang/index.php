<div class="container">
    <h3 class="mb-5">Daftar Peminjaman</h3>
    <div class="d-flex">
            <form action="<?= BASE_URL; ?>/barang/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="keyword" placeholder="Cari Barang..">
                <button type="submit" class="btn btn-success">Cari</button>
            </form>
        <a href="<?= BASE_URL; ?>/barang/index" class="btn btn-secondary">reset</a>
        </div>

    <div class="row">
        <div class="col-lg-8">
            <a href="<?= BASE_URL ?>/barang/tambah" class="btn btn-primary">Tambah Peminjaman</a>
        </div>
    </div>

    <table class="table table-success table-striped table-bordered my-3">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Jenis Barang</th>
                <th scope="col">No Barang</th>
                <th scope="col">Tanggal Meminjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th scope="col">status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
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

            $tglPinjam = strtotime($row['tgl_pinjam']);
            $tglKembali = strtotime($row['tgl_kembali']);

            if ($tglPinjam < $tglKembali) {
              if ($row['status'] == 'Sudah Kembali') {
                echo '<div class="badge bg-success text-white">Sudah Kembali</div>';
              } else {
                echo '<div class="badge bg-danger text-white">Belum Kembali</div>';
              }
            } else {
              echo '<div class="badge bg-danger text-white">Belum Kembali</div>';
            }
            ?>
            </td>
                    <td>
                    <?php 
                if ($tglPinjam < $tglKembali) {
                if ($row['status'] == 'Sudah Kembali') : ?>
                <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="las la-trash"></i>Hapus</a>
                <?php else : ?>
                <a href="<?= BASE_URL ?>/barang/edit/<?= $row['id'] ?>" class="btn btn-primary"><i class="las la-edit"></i>Ubah</a>
                <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="las la-trash"></i>Hapus</a>
                <?php endif; } else { ?>
                    <a href="<?= BASE_URL ?>/barang/edit/<?= $row['id'] ?>" class="btn btn-primary"><i class="las la-edit"></i>Ubah</a>
                    <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="las la-trash"></i>Hapus</a>
                <?php } ?>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
