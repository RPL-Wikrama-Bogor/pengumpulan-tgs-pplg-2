<!DOCTYPE html>
<html>
<head>
    <title>Form Rental Motor</title>
</head>
<body>
    <form action="" method="post">
        <div style="border: 1px solid #ccc; padding: 10px; margin: 20px;">
        <div style="display: flex;">
            <label for="nama">Nama Pelanggan : </label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div style="display: flex;">
            <label for="lama">Lama Waktu Rental (Per Hari) : </label>
            <input type="number" name="lama" id="lama" min="0" required>
        </div>
        <div style="display: flex;">
            <label for="jenis">Pilih Jenis Motor : </label>
            <select name="jenis" required>
                <option value="Beat">Beat</option>
                <option value="Supra">Supra</option>
                <option value="H2r">H2r</option>
            </select>
        </div>
        <button type="submit" name="Rental">Rental</button>
        </div>
        </div>
    </form>
    <?php
    require 'proses.php';
    $proses = new rental();
    $proses->setharga(400000, 700000, 4000000);
    if(isset($_POST['Rental'])){
        $proses->jenisYangDipilih = $_POST['jenis'];
        $proses->lamaWaktu = $_POST['lama'];
        $proses->setlistnama($_POST['nama']);
        $proses->totalHarga();
        $proses->cetakbukti();
    }
    ?>
</body>
</html>
