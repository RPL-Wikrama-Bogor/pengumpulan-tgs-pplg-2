<!DOCTYPE html>
<html>
<head>
    <title>Pemisahan Angka</title>
</head>
<body>
    <h2>Input Bilangan Bulat</h2>
    <form method="post">
        Masukkan bilangan bulat: <input type="text" name="inputNumber">
        <input type="submit" value="Hitung">
    </form>

    <?php
    function splitNumber($number) {
        $satuan = $number % 10;
        $puluhan = floor(($number / 10) % 10);
        $ratusan = floor(($number / 100) % 10);
        
        return [$satuan, $puluhan, $ratusan];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputNumber = isset($_POST["inputNumber"]) ? intval($_POST["inputNumber"]) : 0;

        // Pisahkan angka menjadi satuan, puluhan, dan ratusan
        list($satuan, $puluhan, $ratusan) = splitNumber($inputNumber);

        // Tampilkan hasil
        echo "<h2>Output</h2>";
        echo "Bilangan {$inputNumber} memiliki: <br>";
        echo "{$satuan} satuan, {$puluhan} puluhan, dan {$ratusan} ratusan";
    }
    ?>
</body>
</html>
