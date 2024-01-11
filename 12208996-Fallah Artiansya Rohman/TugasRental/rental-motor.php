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
                            <option value="scooter">Scooter</option>
                            <option value="scopy">scopy</option>
                            <option value="vario">Vario</option>
                            <option value="miosmile">miosmile</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Beli" name="kirim"></td>
                </tr>
            </form>
        </table>
        <div class="card" style="background-color: #B0D9B1 ;width: 30%;padding:2% 2%;margin:2% 2%;">
            <h2>Member Rental</h2>
                <li>sadan</li>
                <li>azqii</li>
                <li>kalan</li>
                <li>banu</li>
                <li>baim</li>
                <li>nazir</li>
        </div>
    </center>
</body>
</html>
<?php
include 'proses.php';
$proses = new Beli();
$proses->setHarga(70000, 40000, 90000, 20000);
if (isset($_POST['kirim'])) {
    $proses->namaPelanggan= $_POST['nama'];
    $proses->jumlah = $_POST['rental'];
    $proses->jenis = $_POST['jenis'];
    $proses->hargaMember();
    $proses->cetakPembelian();
}
?>