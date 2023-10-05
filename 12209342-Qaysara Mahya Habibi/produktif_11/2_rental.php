<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>

<body>
    <h1>Capitol's Rental Center</h1>

    <form action="" method="post">
        <div style="display: flex;">
            <label>Nama Pelanggan : </label>
            <input type="text" name="nama" required>
        </div>
        <div style="display: flex;">
            <label>Lama Waktu Rental (HARI) : </label>
            <input type="number" name="waktu" required>
        </div>
        <div style="display: flex;">
            <label>Jenis Motor : </label>
            <select name="jenis" required>
            <option hidden disabled selected>---Pilih Motor---</option>
                <option value="Scooter">Scooter</option>
                <option value="Cruiser">Cruiser</option>
                <option value="Scrambler">Scrambler</option>
            </select>
        </div>
        <button type="submit" name="rental">Submit</button>
    </form>

    <?php
    include '2_logic.php';
    $proses = new Rental();
    $proses->setHarga(80000, 90000, 100000);

    if (isset($_POST['rental'])) {
        $proses->namaCust = $_POST['nama'];
        $proses->lamaRental = $_POST['waktu'];
        $proses->motorPilihan = $_POST['jenis'];
        $proses->totalRental();
        $proses->hargaAdiskon();
        $proses->cetakStruk();
    }
    ?>
</body>

</html>