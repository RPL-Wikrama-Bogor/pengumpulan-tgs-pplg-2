<?php
// Array daftar member
$listMember = ['ana', 'sam', 'alex', 'ara'];

// Inisialisasi variabel
$namaPelanggan = "";
$lamaRental = 0;
$jenisMotor = "";
$hargaPerHari = 0;
$diskon = 0;
$biayaTotal = 0;
$statusMember = "Bukan Member";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari form
    $namaPelanggan = $_POST["nama_pelanggan"];
    $lamaRental = intval($_POST["lama_rental"]);
    $jenisMotor = $_POST["jenis_motor"];
    
    // Menghitung harga rental per hari sesuai dengan jenis motor
    if ($jenisMotor == "moped") {
        $hargaPerHari = 50000;
    } elseif ($jenisMotor == "scooter") {
        $hargaPerHari = 70000;
    } elseif ($jenisMotor == "sportbike") {
        $hargaPerHari = 100000;
    }
    
    // Mengecek apakah pelanggan adalah member
    if (in_array(strtolower($namaPelanggan), $listMember)) {
        $statusMember = "Member";
        $diskon = 0.05; // Diskon 5% untuk member
    }
    
    // Menghitung biaya total
    $biayaTotal = $lamaRental * $hargaPerHari * (1 - $diskon);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rental Motor</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-image: url(https://www.freevector.com/uploads/vector/preview/27644/rental2.jpg);
    margin: 0;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    }

    h1 {
    background-color: #fff;
    font-size: 36px;
    text-align: center;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    form {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
    margin: 0 auto;
    }

    label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
     }

    input[type="text"],
    input[type="number"],
    select {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    }

    input[type="submit"] {
    background: linear-gradient(to bottom, #007bff, #0056b3);
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s;
    }

    input[type="submit"]:hover {
    background: linear-gradient(to bottom, #0056b3, #003c80);
    }

    h2 {
    margin-top: 20px;
    text-align: center;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    p {
    font-size: 16px;
    color: #333;
    margin-bottom: 10px;
    }

    p strong {
    color: #007bff;
    }

    .hasil-container {
    background-color: #fff;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    margin-top: 10px;
    }

    </style>
</head>
<body>
    <h1>Rental Motor</h1>
    <form method="post">
        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" name="nama_pelanggan" required>
        <br>
    <h3>Berikut ialah daftar member, yang berhak mendapatkan diskon</h3>
    <ul>
        <li>ana</li>
        <li>alex</li>
        <li>ara</li>
        <li>sam</li>
    </ul>
        <br>
        <label for="lama_rental">Lama Rental (per hari):</label>
        <input type="number" name="lama_rental" required>
        <br>
        <label for="jenis_motor">Jenis Motor:</label>
        <select name="jenis_motor" required>
            <option value="moped">Moped</option>
            <option value="scooter">Scooter</option>
            <option value="sportbike">Sportbike</option>
        </select>
        <br>
        <input type="submit" value="Submit">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
        <div class="hasil-container">
        <p ><?php echo $namaPelanggan . " berstatus sebagai " . $statusMember . " mendapatkan " . ($diskon * 100) . "%"; ?></p>
        <p>Jenis Motor yang Dirental: <?php echo $jenisMotor; ?></p>
        <p>Selama <?php echo $lamaRental; ?> hari</p>
        <p>Harga Rental per Hari: Rp. <?php echo number_format($hargaPerHari, 0, ",", "."); ?></p>
        <p>Besar yang Harus Dibayarkan adalah Rp. <?php echo number_format($biayaTotal, 0, ",", "."); ?></p>
    </div>
    <?php } ?>
</body>
</html>
