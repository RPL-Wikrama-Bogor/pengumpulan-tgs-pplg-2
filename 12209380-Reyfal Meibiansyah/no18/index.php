<!DOCTYPE html>
<html>
<head>
    <title>Cari Juara Kelas</title>
</head>
<body>
    <style>
        body{
            background-color:#94A684;
        }
        .card{
            background-color: #E4E4D0;
            width: 260px;
            height: 540px;
            margin: 10px;
            box-sizing: border-box;
		    padding: 10px;
        }
    </style>
    <div class="card">
    <h2>Mencari Juara Kelas</h2>
    <form method="post" action="">
        <label for="nama">Nama Siswa:</label>
        <br>
        <input style=" width: 35vh;" type="text" id="nama" name="nama" required><br><br>

        <label for="mtk">Nilai Matematika:</label>
        <br>
        <input style=" width: 35vh;" type="number" id="mtk" name="mtk" required><br><br>

        <label for="indo">Nilai Bahasa Indonesia:</label>
        <br>
        <input style=" width: 35vh;" type="number" id="indo" name="indo" required><br><br>

        <label for="ingg">Nilai Bahasa Inggris:</label>
        <br>
        <input style=" width: 35vh;" type="number" id="ingg" name="ingg" required><br><br>

        <label for="dpk">Nilai DPK:</label>
        <br>
        <input style=" width: 35vh;" type="number" id="dpk" name="dpk" required><br><br>

        <label for="agama">Nilai Agama:</label>
        <br>
        <input style=" width: 35vh;" type="number" id="agama" name="agama" required><br><br>

        <label for="kehadiran">Kehadiran (%):</label>
        <br>
        <input style=" width: 35vh;" type="number" id="kehadiran" name="kehadiran" required><br><br>

        <input type="submit" name="submit" value="Cari Juara Kelas">
    </div>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $mtk = $_POST['mtk'];
        $indo = $_POST['indo'];
        $ingg = $_POST['ingg'];
        $dpk = $_POST['dpk'];
        $agama = $_POST['agama'];
        $kehadiran = $_POST['kehadiran'];

        // Menghitung nilai rata-rata dari 5 mata pelajaran
        $rata_rata = ($mtk + $indo + $ingg + $dpk + $agama);

        // Mengecek jika nilai rata-rata >= 475 dan kehadiran = 100%
        if($rata_rata >= 475 && $kehadiran == 100){
            echo "<p style='color:green;'>Selamat, " . $_POST['nama'] . " adalah juara kelas!</p>";
        } else {
            echo "<p style='color:red;'>Maaf, " . $_POST['nama'] . " belum memenuhi persyaratan juara kelas.</p>";
        }
    }
    ?>
</body>
</html>