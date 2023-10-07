<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>

    <div class="row">
        <div class="col-lg-8">
            <a href="<?= BASE_URL; ?>barang/tambah" class="btn btn-primary" >Tambah Peminjaman</a>
        </div>
        <div class="col-lg-4">
            <form action="<?= BASE_URL;?>barang/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari.." name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-dark" type="submit" id="tombolCari">Cari</button>
                    <a href="<?= BASE_URL?>barang/index" class="mx-1 btn btn-danger" id="tombolReset">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <br>
    <br>
    <table class="table table-dark table-striped table-bordered">
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
            <?php foreach ($data['barang'] as $row) :?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_peminjam'];?></td>
                    <td><?= $row['jenis_barang'];?></td>
                    <td><?= $row['no_barang'];?></td>
                    <td><?= $row['tgl_pinjam'];?></td>
                    <td><?= $row['tgl_kembali'];?></td>
                    <td>
                    <?php if ($row['status'] == 'sudah kembali'){
                        echo '<div class="btn btn-success text-white">Sudah Kembali</div>';
                    } else {
                    echo '<div class="btn btn-danger text-white">Belum kembali</div>';
                    }
                    ?>
                </td>
                <td>
                    <?php if ($row['status'] == 'sudah kembali') : ?>
                    <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus data?');"><i class="las la-trash">HAPUS</i></a>
                    <?php else : ?>
                <a href="<?= BASE_URL ?>/barang/edit/<?= $row['id'] ?>" class="btn btn-primary">edit</a>
                <a href="<?= BASE_URL ?>/barang/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('hapus data?');">HAPUS</a>
                <?php endif; ?>
               </td>
            </tr>
            <?php $no++;endforeach;?>
             </tbody>
    </table>
</div>