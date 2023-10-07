<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
    <center>
        <h1>Rental Montor</h1>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Nama Pelangan: </td>
                    <td>
                        <input type="text" name="nama"require>
                    </td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (perHari): </td>
                    <td>
                        <input type="number" name="perhari"require>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Motor: </td>
                    <td>
                        <select name="jenis" require>
                            <option value="Matic">Nmax</option>
                            <option value="Manual">SupraX</option>
                            <option value="Sport">CBR 250rr</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" value="Sewa" name="kirim"></td>
                </tr>
            </form>
        </table>
    </center>
</body>
</html>
<?php
include 'proses.php';
$proses = new Sewa();
$proses ->setHarga(70000, 50000, 280000);
if(isset($_POST['kirim'])){
    $proses->namaPelanggan = $_POST['nama'];
    $proses->jumlah = $_POST['perhari'];
    $proses->jenis = $_POST['jenis'];
    $proses->hargaSewa();
    $proses->cetakSewa();
}
?>