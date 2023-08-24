<!DOCTYPE html>
<html>
<head>
    <title>Cek Cuaca</title>
</head>
<body>
    <h2>Cek Cuaca</h2>
    <form method="post">
        Masukkan temperatur (°F): <input type="text" name="temperature">
        <input type="submit" value="Cek">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temperature = isset($_POST["temperature"]) ? floatval($_POST["temperature"]) : 0;

        if ($temperature > 300) {
            echo "<h3>Panas</h3>";
        } elseif ($temperature < 250) {
            echo "<h3>Dingin</h3>";
        } else {
            echo "<h3>Normal</h3>";
        }
    }
    ?>
</body>
</html>
