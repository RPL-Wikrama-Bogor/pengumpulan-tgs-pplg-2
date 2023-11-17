<div class="container">
    <h3 class="mb-3">Daftar Peminjaman</h3>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-8">
            <a href="<?= BASE_URL ?>/pinjam/tambah" class="btn btn-primary">Tambah Peminjaman</a>
        </div>
    <div class="col-lg-4">
        <form class="d-flex mb-3" action="<?= BASE_URL ?>/pinjam/cari" role="search" method="post">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" id="keyword">
            <button class="btn btn-outline-success me-2" type="submit" name="cari">Search</button>
            <a href="<?= BASE_URL ?>/pinjam/index" class="btn btn-outline-danger" type="submit">Reset</a>
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
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Selesai</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data['barang'] as $row) :?>
                <tr>
                    <td><?= $no;?></td>
                    <td><?= $row['nama_peminjaman'];?></td>
                    <td><?= $row['jenis_barang'];?></td>
                    <td><?= $row['no_barang'];?></td>
                    <td><?= $row['tgl_pinjam'];?></td>
                    <td><?= $row['tgl_kembali'];?></td>
                    <td><?php if ($row['status'] == "Belum Kembali") { ?>
                        <button type="button" class="btn btn-primary btn-danger"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><?= $row["status"] ?></button>
                    <?php }else if ($row['status'] == "Sudah Kembali") { ?>
                        <button type="button" class="btn btn-primary btn-success"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;"><?= $row["status"] ?></button>
                    <?php } ?>
                    </td>
                    <td><?php if ($row["status"] == "Sudah Kembali")  { ?>
                        <a href="<?= BASE_URL?>/pinjam/hapus/<?= $row['id'];?>" class="btn btn-danger" onclick="return confirm('Hapus Data');">Hapus</a>
                    <?php } else { ?>
                        <a href="<?= BASE_URL?>/pinjam/edit/<?= $row['id'];?>" class="btn btn-primary" name="edit">Edit</a>
                        <a href="<?= BASE_URL?>/pinjam/hapus/<?= $row['id'];?>" class="btn btn-danger" onclick="return confirm('Hapus Data');">Hapus</a>
                    <?php } ?>
                    </td>
                </tr>
            <?php $no++; endforeach;?>
        </tbody>
    </table>
</div>