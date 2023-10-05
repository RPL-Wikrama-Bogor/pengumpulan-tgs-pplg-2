<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penghitungan Penjualan Tiket Bioskop</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 24px;
    background-size: cover;
    background-position: center;
    background-image:linear-gradient(45deg, salmon, bisque) ;
}

h1 {
    color: #333;
}

.kelas {
    margin: 10px;
}

input[type="number"] {
    width: 60px;
}

.btn {
  box-sizing: border-box;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: transparent;
  border: 2px solid #e74c3c;
  border-radius: 0.6em;
  color: #e74c3c;
  cursor: pointer;
  display: flex;
  align-self: center;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1;
  margin: 20px;
  padding: 1.2em 2.8em;
  text-decoration: none;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
}
.btn:hover, .btn:focus {
  color: #fff;
  outline: 0;
}
.third {
  border-color: #3498db;
  color: #fff;
  box-shadow: 0 0 40px 40px #3498db inset, 0 0 0 0 #3498db;
  transition: all 150ms ease-in-out;
}
.third:hover {
  box-shadow: 0 0 10px 0 #3498db inset, 0 0 10px 4px #3498db;
}

    </style>
</head>
<body>
    <h1>Penghitungan Penjualan Tiket Bioskop</h1>
    <form action="" method="post">
        <div class="kelas">
            <label for="vip">VIP (Harga tiket: Rp100,000)</label>
            <input type="number" id="vip" name="jumlah_vip" min="0">
        </div>
        <div class="kelas">
            <label for="eksekutif">Eksekutif (Harga tiket: Rp75,000)</label>
            <input type="number" id="eksekutif" name="jumlah_eksekutif" min="0">
        </div>
        <div class="kelas">
            <label for="ekonomi">Ekonomi (Harga tiket: Rp50,000)</label>
            <input type="number" id="ekonomi" name="jumlah_ekonomi" min="0">
        </div>
       <center><button class="btn third" type="submit" name="submit" value="Hitung">Kirim</button></center>
    </form>

    <?php
if (isset($_POST['submit'])) {
    $harga_vip = 100000;
    $harga_eksekutif = 75000;
    $harga_ekonomi = 50000;

    $jumlah_vip = $_POST["jumlah_vip"];
    $jumlah_eksekutif = $_POST["jumlah_eksekutif"];
    $jumlah_ekonomi = $_POST["jumlah_ekonomi"];

    // Menghitung keuntungan per kelas
    $keuntungan_vip = hitungKeuntungan($jumlah_vip, $harga_vip);
    $keuntungan_eksekutif = hitungKeuntungan($jumlah_eksekutif, $harga_eksekutif);
    $keuntungan_ekonomi = $jumlah_ekonomi * 0.07;

    // Menghitung total keuntungan
    $total_keuntungan = $keuntungan_vip + $keuntungan_eksekutif + $keuntungan_ekonomi;

    // Menampilkan output
    echo "<h2>Keuntungan per Kelas Tiket:</h2>";
    echo "<p>Keuntungan VIP: Rp " . number_format($keuntungan_vip, 0, ",", ".") . "</p>";
    echo "<p>Keuntungan Eksekutif: Rp " . number_format($keuntungan_eksekutif, 0, ",", ".") . "</p>";
    echo "<p>Keuntungan Ekonomi: Rp " . number_format($keuntungan_ekonomi, 0, ",", ".") . "</p>";
    
    echo "<h2>Keuntungan Keseluruhan:</h2>";
    echo "<p>Total Keuntungan: Rp " . number_format($total_keuntungan, 0, ",", ".") . "</p>";

    echo "<h2>Jumlah Tiket per Kelas:</h2>";
    echo "<p>Jumlah Tiket VIP: " . $jumlah_vip . "</p>";
    echo "<p>Jumlah Tiket Eksekutif: " . $jumlah_eksekutif . "</p>";
    echo "<p>Jumlah Tiket Ekonomi: " . $jumlah_ekonomi . "</p>";

    echo "<h2>Total Tiket dari Seluruh Kelas:</h2>";
    $total_tiket = $jumlah_vip + $jumlah_eksekutif + $jumlah_ekonomi;
    echo "<p>Total Tiket: " . $total_tiket . "</p>";
}

function hitungKeuntungan($jumlah_tiket, $harga_tiket) {
    if ($jumlah_tiket >= 35) {
        return $jumlah_tiket * $harga_tiket * 0.25;
    } elseif ($jumlah_tiket >= 20) {
        return $jumlah_tiket * $harga_tiket * 0.15;
    } else {
        return $jumlah_tiket * $harga_tiket * 0.05;
    }
}

?>

</body>
</html>
