<?php
// Fungsi untuk menghitung keuntungan sesuai aturan yang diberikan
function calculateProfit($class, $sold) {
    if ($class == 'VIP') {
        if ($sold >= 35) {
            return 0.25 * 50 ;
        } elseif ($sold >= 20) {
            return 0.15 * 50 ;
        } else {
            return 0.05 * 50 ;
        }
    } elseif ($class == 'Eksekutif') {
        if ($sold >= 40) {
            return 0.20 * 50 ;
        } elseif ($sold >= 20) {
            return 0.10 * 50 ;
        } else {
            return 0.02 * 50 ;
        }
    } elseif ($class == 'Ekonomi') {
        return 0.07 * 50 ;
    } else {
        return 0;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vipSold = $_POST['vip_sold'];
    $executiveSold = $_POST['executive_sold'];
    $economySold = $_POST['economy_sold'];

    $vipProfit = calculateProfit('VIP', $vipSold);
    $executiveProfit = calculateProfit('Eksekutif', $executiveSold);
    $economyProfit = calculateProfit('Ekonomi', $economySold);

    $totalProfit = $vipProfit + $executiveProfit + $economyProfit;
    $totalTickets = $vipSold + $executiveSold + $economySold;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hitung Penghasilan Penjualan Tiket Bioskop</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    text-align: center;
}

h1 {
    color: #333;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}

label {
    font-weight: bold;
    margin: 10px 0;
}

input[type="number"] {
    width: 60px;
    padding: 5px;
    margin-right: 10px;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

h2 {
    margin-top: 20px;
}

p {
    font-weight: bold;
}
 </style>
<body>
<div class="container">
    <h1>Hitung Penghasilan Penjualan Tiket Bioskop</h1>
    <form method="post" action="">
        <label for="vip_sold">Jumlah tiket VIP terjual:</label>
        <input type="number" name="vip_sold" id="vip_sold" min="0" value="0"><br>

        <label for="executive_sold">Jumlah tiket Eksekutif terjual:</label>
        <input type="number" name="executive_sold" id="executive_sold" min="0" value="0"><br>

        <label for="economy_sold">Jumlah tiket Ekonomi terjual:</label>
        <input type="number" name="economy_sold" id="economy_sold" min="0" value="0"><br>

        <button type="submit">Hitung</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h2>Keuntungan per kelas tiket:</h2>
        <p>Keuntungan kelas VIP: Rp <?php echo number_format($vipProfit, 2); ?></p>
        <p>Keuntungan kelas Eksekutif: Rp <?php echo number_format($executiveProfit, 2); ?></p>
        <p>Keuntungan kelas Ekonomi: Rp <?php echo number_format($economyProfit, 2); ?></p>

        <h2>Keuntungan keseluruhan:</h2>
        <p>Keuntungan keseluruhan: Rp <?php echo number_format($totalProfit, 2); ?></p>

        <h2>Jumlah tiket per kelas:</h2>
        <p>Jumlah tiket kelas VIP terjual: <?php echo $vipSold; ?></p>
        <p>Jumlah tiket kelas Eksekutif terjual: <?php echo $executiveSold; ?></p>
        <p>Jumlah tiket kelas Ekonomi terjual: <?php echo $economySold; ?></p>

        <h2>Total tiket dari seluruh kelas:</h2>
        <p>Total tiket terjual: <?php echo $totalTickets; ?></p>
    <?php endif; ?>
</body>
</html>
