<?php
    // Preparation
    $fahrenheit;
    $celcius;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal-9</title>
</head>
<body>
    <!-- Siapkan Input -->
    <h1>Temperatur</h1>
    <form action="" method="post">
        <div style="display: flex;">
            <label for="suhu">Suhu (Dalam satuan fahrenheit) : </label>
            <input type="number" name="suhu" id="suhu">
        </div>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>
</html>

<?php
    // Cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        $fahrenheit = $_POST['suhu'];
        
        $celcius = $fahrenheit - 32 / 1.8;

        if ($celcius > 300) {
            echo "Suhunya Panas";
        } else if ($celcius < 250) {
            echo "Suhunya Dingin";
        } else {
            echo "Suhunya Normal";
        }

    }
?>