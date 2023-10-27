<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $siswa = [
        [
            "nama" => "Muhammad",
            "nis" => 12209221,
            "rombel" => "PPLG XI-2",
            "rayon" => "Tajur 1",
            "umur" => "16",
        ],
        [
            "nama" => "Eka",
            "nis" => 12209222,
            "rombel" => "PPLG XI-2",
            "rayon" => "Tajur 2",
            "umur" => "17",
        ],
        [
            "nama" => "Darma",
            "nis" => 12209223,
            "rombel" => "PPLG XI-2",
            "rayon" => "Tajur 3",
            "umur" => "18",
        ],
        [
            "nama" => "Putra",
            "nis" => 12209224,
            "rombel" => "PPLG XI-2",
            "rayon" => "Tajur 4",
            "umur" => "19",
        ],
        ];
    ?>
    <form action="" method="post">
        <ul>
            <li>
                <a href="?cari">Cari yang sudah berusia lebih dari 17 tahun</a>
            </li>
            <li>
                <div style="display: flex;">
                    <label for="nama">Cari berdasarkan nama :</label>
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