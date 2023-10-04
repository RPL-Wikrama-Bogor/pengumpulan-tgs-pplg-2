<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA UMUR SISWA</title>
</head>
<body>
<?php
    $siswa = [
        [
            "nama" => "udil",
            "nis" => 12209168,
            "rombel" => "PPLG XI-2",
            "rayon" => "Tajur 1",
            "umur" => "16",
        ],
        [
            "nama" => "Ihsan",
            "nis" => 12209111,
            "rombel" => "PPLG XI-2",
            "rayon" => "Cicurug 2",
            "umur" => "17",
        ],
        [
            "nama" => "Azka",
            "nis" => 12209151,
            "rombel" => "PPLG XI-2",
            "rayon" => "Cibedug 4",
            "umur" => "18",
        ],
        [
            "nama" => "razif",
            "nis" => 12209133,
            "rombel" => "PPLG XI-3",
            "rayon" => "cisarua 4",
            "umur" => "19",
        ],
        [
            "nama" => "nazir",
            "nis" => 12209445,
            "rombel" => "PPLG XI-2",
            "rayon" => "cisarua 4",
            "umur" => "20",
        ],
        ];
    ?>
    <form action="" method="post">
        <ul>
            <li>
                <a href="?cari">Cari yang sudah berusia lebih dari 17 tahun</a>
            </li><br>
            <li>
                <div style="display: flex;">
                    <label for="nama">Cari berdasarkan nama : </label>
                    <input type="nama" name="nama" id="nama">
                    <button type="submit" name="submit">Cari</button>
                </div>
            </li>
        </ul>
    </form>

    <?php
    if(isset($_GET['cari'])){
        foreach($siswa as $key => $data_siswa){
            if($data_siswa['umur'] >= 17){
                echo "<li>$data_siswa[nama] | $data_siswa[umur]</li><br>";
            }
        }
    }
    ?>

    <?php
    if(isset($_POST['submit'])){
        $nama = $_POST['nama'];
        foreach($siswa as $key => $data_siswa){
            if($nama == $data_siswa['nama']){
                echo "Nama: $nama<br>";
                echo "NIS: $data_siswa[nis]<br>";
                echo "Rombel: $data_siswa[rombel]<br>";
                echo "Rayon: $data_siswa[rayon]<br>";
                echo "Umur: $data_siswa[umur]<br>";
            }
        }
    }
    ?>
</body>
</html>