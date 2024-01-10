<!DOCTYPE html>
<html>
<head>
    <title>Mencari Bilangan Terbesar</title>
</head>
<body>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-top: 0;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

input[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.result {
    font-weight: bold;
    color: #2ecc71;
    margin-top: 20px;
}

    </style>
    
    <div class="container">
        <h2>Mencari Bilangan Terbesar</h2>
        <form method="post" action="">
            <label for="bilanganA">Masukkan bilangan pertama (A):</label>
            <input type="number" name="bilanganA" id="bilanganA"><br>
            <label for="bilanganB">Masukkan bilangan kedua (B):</label>
            <input type="number" name="bilanganB" id="bilanganB"><br>
            <label for="bilanganC">Masukkan bilangan ketiga (C):</label>
            <input type="number" name="bilanganC" id="bilanganC"><br>
            <input type="submit" value="Cari Bilangan Terbesar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $bilanganA = intval($_POST["bilanganA"]);
            $bilanganB = intval($_POST["bilanganB"]);
            $bilanganC = intval($_POST["bilanganC"]);

            // Mencari bilangan terbesar
            $bilanganTerbesar = $bilanganA;
            if ($bilanganB > $bilanganTerbesar) {
                $bilanganTerbesar = $bilanganB;
            }
            if ($bilanganC > $bilanganTerbesar) {
                $bilanganTerbesar = $bilanganC;
            }

            echo "<p class='result'>Bilangan terbesar adalah: " . $bilanganTerbesar . "</p>";
        }
        ?>
    </div>
</body>
</html>
