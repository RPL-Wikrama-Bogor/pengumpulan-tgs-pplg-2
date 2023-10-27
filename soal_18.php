<!DOCTYPE html>
<html>
<head>
    <title>Pencarian Juara Kelas</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    padding: 20px;
    text-align: center;
}

h1 {
    color: #333;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
    max-width: 500px;
}

h3 {
    font-weight: bold;
    margin-bottom: 10px;
}

input[type="number"] {
    width: 100px;
    padding: 5px;
    margin: 5px;
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

    </style>
</head>
<body>
    <h1>Pencarian Juara Kelas</h1>

    <form action="" method="post">
        <?php
        for ($i = 1; $i <= 15; $i++) {
            echo "<h3>Data siswa ke-$i</h3>";
            echo "Nilai Matematika: <input type='number' name='nilai_mtk_$i' required><br>";
            echo "Nilai Bahasa Indonesia: <input type='number' name='nilai_indo_$i' required><br>";
            echo "Nilai Bahasa Inggris: <input type='number' name='nilai_ingg_$i' required><br>";
            echo "Nilai Dpk: <input type='number' name='nilai_dpk_$i' required><br>";
            echo "Nilai Agama: <input type='number' name='nilai_agama_$i' required><br>";
            echo "Kehadiran (0-100): <input type='number' name='kehadiran_$i' required><br><br>";
        }
        ?>
        <input type="submit" value="Cari Juara Kelas">
    </form>

    <?php
$jumlah_siswa = 15;
$total_nilai_kelas = 0;
$total_kehadiran_kelas = 0;
$juara_kelas = false;

for ($i = 1; $i <= $jumlah_siswa; $i++) {
    $nilai_mtk = floatval($_POST["nilai_mtk_$i"]);
    $nilai_indo = floatval($_POST["nilai_indo_$i"]);
    $nilai_ingg = floatval($_POST["nilai_ingg_$i"]);
    $nilai_dpk = floatval($_POST["nilai_dpk_$i"]);
    $nilai_agama = floatval($_POST["nilai_agama_$i"]);
    $kehadiran = intval($_POST["kehadiran_$i"]);

    $total_nilai_siswa = $nilai_mtk + $nilai_indo + $nilai_ingg + $nilai_dpk + $nilai_agama;
    $total_kehadiran_kelas += $kehadiran;
    $total_nilai_kelas += $total_nilai_siswa;

    if ($total_nilai_siswa >= 475 && $kehadiran == 100) {
        echo "Siswa $i adalah kandidat juara kelas.<br>";
        $juara_kelas = true;
    } else {
        echo "Siswa $i tidak memenuhi syarat untuk juara kelas.<br>";
    }
}
?>

</body>
</html>
