<div class="container">

    <h3 class="mb-3">Daftar Buku</h3>
    <br>
    <div class="d-flex justify-content-between">

        <div>
            <a href="<?= BASE_URL ?>/buku/tambah" class="btn btn-primary"> Tambah Peminjaman </a>
        </div>

        <div class="d-flex">
            <form action="<?= BASE_URL; ?>/Buku/cari" method="post" class="d-flex">
                <input type="text" class="form-control" name="search">
                <button type="submit" class="btn btn-outline-secondary"> Cari </button>
            </form>

            <a href="<?= BASE_URL; ?>/buku/index" class="btn btn-outline-danger text-secondary">Reset</a>

        </div>

    </div>


    <table class="table table-success table-striped table-bordered">

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
            <?php $no = 1; ?>

            <?php foreach ($data['buku'] as $row) : ?>

                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row['nama_peminjam']; ?></td>
                    <td><?= $row['jenis_barang']; ?></td>
                    <td><?= $row['no_barang']; ?></td>
                    <td><?= $row['tgl_pinjam']; ?></td>
                    <td><?= $row['tgl_kembali']; ?></td>

                    <td>
                        <?php

                        if (date('Y-m-d  H:i:s', time() + (60 * 60 * 5)) > $row['tgl_kembali']) {
                            echo '<span class = "badge text-bg-success">Sudah Kembali</span>';

                        ?>
                    </td>
                    <td>
                        <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?');"> Hapus </a>
                    </td>
                <?php
                        } elseif ($row['status'] == 'sudah kembali') {
                            echo '<span class = "badge text-bg-success">sudah kembali</span>';

                ?>
                    <td>
                        <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?');"> Hapus </a>
                    </td>


                <?php
                        } else {
                            echo '<span class = "badge text-bg-danger">belum kembali</span>';
                ?>

                    <td>
                        <a href="<?= BASE_URL ?>/buku/edit/<?= $row['id'] ?>" class="btn btn-primary"> Edit </a>
                        <a href="<?= BASE_URL ?>/buku/hapus/<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus Data?');"> Hapus </a>
                    </td>


                <?php
                        }

                ?>

                </tr>

            <?php $no++;
            endforeach; ?>
        </tbody>


    </table>


</div>