<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
    <center>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Nama Pelanggan: </td>
                    <td>
                        <input type="text" name="nama" required>
                    </td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (perhari):</td>
                    <td>
                        <input type="number" name="rental" required>
                    </td>
                </tr>
                <tr>
                    <td>Pilih Tipe Motor:</td>
                    <td>
                        <select name="jenis" required>
                            <option value="Zx25RR">Zx25RR</option>
                            <option value="CBR250RR">CBR250RR</option>
                            <option value="Ducati">Ducati</option>
                            <option value="H2R">H2R</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Beli" name="kirim"></td>
                </tr>
            </form>
        </table>
        <div class="card">
            <h2>Member Rental</h2>
                <li>Ihsan</li>
                <li>Andi</li>
                <li>Sugi</li>
                <li>liong</li>
        </div>
    </center>
</body>
</html>
<?php
include 'logic.php';
$proses = new Beli();
$proses->setHarga(50000, 25000, 75000, 100000);
if (isset($_POST['kirim'])) {
    $proses->namaPelanggan= $_POST['nama'];
    $proses->jumlah = $_POST['rental'];
    $proses->jenis = $_POST['jenis'];
    $proses->hargaMember();
    $proses->cetakPembelian();
}
?>