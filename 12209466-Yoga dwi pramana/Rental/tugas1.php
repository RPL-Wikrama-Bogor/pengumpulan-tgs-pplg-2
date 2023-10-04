<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <style>
        .container{
            border: 1px solid black;
            width: 500px;
        }
    </style>
</head>
<body>
    <center>
<form action="" method="post">
        <h3>Rental Motor</h3>
        <!-- <div style="display: flex;"> -->
            <label for="nama">Nama Pelanggan :</label>
            <input type="text" name="nama" id="nama" required>
            <br>
        </div>
        <!-- <div style="display: flex;"> -->
            <label for="waktu">Lama Waktu Rental (per hari) :</label>
            <input type="number" name="waktu" id="waktu" required>
            <br>
        </div>
        <!-- <div style="display: flex;"> -->
            <label for="jenis">Jenis Motor :</label>
            <select name="jenis" required>
                <br>
                <option value="scooter">Scooter</option>
                <option value="aerox">Aerox</option>
                <option value="vario">Vario</option>
                <option value="beat">Beat</option>
            </select>
        </div>
        <button type="submit" name="submit">Submit</button>
    </form>
</center>
</body>
</html>

<?php
require 'proses.php';

// Buat instance dari kelas 'Peminjaman'
$proses = new Peminjaman();

// harga
$proses->setHarga(70000, 60000, 50000, 40000);

if(isset($_POST['submit'])) {
    // Ambil data formulir
    $proses->namaPelanggan = strtolower($_POST['nama']);
    $proses->jenisYangDipilih = $_POST['jenis'];
    $proses->waktu = $_POST['waktu']; 
    $proses->totalHarga();
  
    // Tampilkan struk
    $proses->cetakStruk();
}
?>
