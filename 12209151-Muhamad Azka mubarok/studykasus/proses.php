<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentalMotor</title>
<style>

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


</style>
</head>
<body>
    <div class="container">
        <h1>Rental Motor</h1>
        <form action="" method="post">
            <label for="nama">Nama Pelanggan:</label>
            <input type="text" name="nama" id="nama" required><br>

            <label for="waktu">Lama Waktu Rental (per hari):</label>
            <input type="number" name="waktu" id="waktu" required>
            <label for="jenis">Jenis Motor:</label>
            <select name="jenis" required>
                <option value="matic">Matic</option>
                <option value="sport">Sport</option>
                <option value="trail">Trail</option>
                <option value="skuter">Scooter</option>
            </select><br>

            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>
<?php
require 'tugas.php';
$rental = new Pembelian();

$rental->setHarga(70000,80000,90000,60000);

    if (isset($_POST['submit'])) {
        $rental->nama =strtolower($_POST['nama']);
        $rental->waktu = $_POST['waktu'];
        $rental->jenisMotor = $_POST['jenis'];
        
        $rental->totalHarga();
        $rental->cetakBukti();

    
}
?>