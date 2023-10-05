<!DOCTYPE html>
<html>
<head>
    <title>Pencarian Juara Kelas</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1000px;
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
    flex-wrap: wrap;
    justify-content: center;
}

h2 {
    width: 100%;
    text-align: center;
    margin-top: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin: 10px 0;
}

input[type="number"] {
    width: 60px;
    padding: 5px;
    margin-right: 10px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    margin-top: 20px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}



 </style>
<body>
<div class="container">
    <h1>Pencarian Juara Kelas</h1>
    <form method="post" action="">
        <?php
        $jumlahSiswa = 15;
        $minimalScore = 475;
        $jumlahMapel = 5;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $juara = null;

            for ($i = 1; $i <= $jumlahSiswa; $i++) {
                $total_score = 0;
                $kehadiran = true;

                for ($j = 1; $j <= $jumlahMapel; $j++) {
                    $score = $_POST["mapel_$j" . "_$i"];
                    $total_score += $score;
                }

                $kehadiran_persentase = $_POST["kehadiran_$i"];
                if ($kehadiran_persentase < 100) {
                    $kehadiran = false;
                } //harus 100% kehadiran nya (berdasarkan perintah)
                
                if ($total_score >= $minimalScore && $kehadiran) {
                    $juara = "Siswa $i";
                    break; // Hanya perlu satu juara
                }
            }

            if ($juara) {
                echo "<h2>Juara Kelas:</h2>";
                echo "<p>$juara</p>";
            } else {
                echo "<p>Tidak ada siswa yang memenuhi syarat juara kelas.</p>";
            }
        } else {
            for ($i = 1; $i <= $jumlahSiswa; $i++) {
                echo "<h2>Siswa $i</h2>";
                echo "<label for='kehadiran_$i'>Kehadiran (%):</label>";
                echo "<input type='number' name='kehadiran_$i' min='0' max='100' required><br>";
                for ($j = 1; $j <= $jumlahMapel; $j++) {
                    $mapel = ['MTK', 'INDO', 'INGG', 'DPK', 'Agama'][$j - 1];
                    echo "<label for='mapel_$j" . "_$i'>$mapel:</label>";
                    echo "<input type='number' name='mapel_$j" . "_$i' required><br>";
                }
            }
            echo "<br>";
             echo "<input type='submit' value='Cari Juara'>";
        }
        ?>
    </form>
</body>
</html>

