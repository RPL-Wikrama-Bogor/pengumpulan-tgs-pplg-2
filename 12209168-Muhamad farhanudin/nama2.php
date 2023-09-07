<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hehe</title>
    <style>
        body {
            background-color: #E4F1FF;
        }
    </style>
</head>
<body>
<?php
    $siswa = [
        [
            "nama" => "farhan",
            "nis" => 12209168,
            "rombel" => "PPLG XI-2",
            "rayon" => "Tajur 1",
            "umur" => 16
        ],
        [
            "nama" => "san",
            "nis" => 12209111,
            "rombel" => "PPLG XI-2",
            "rayon" => "Tajur 2",
            "umur" => 17
        ],
        [
            "nama" => "zaki",
            "nis" => 12209223,
            "rombel" => "PPLG XI-2",
            "rayon" => "wikrama 2",
            "umur" => 18
        ],
        [
            "nama" => "tegar",
            "nis" => 12209199,
            "rombel" => "PPLG XI-2",
            "rayon" => "cicurug 4",
            "umur" => 16
        ],
        [
            "nama" => "asep",
            "nis" => 12209190,
            "rombel" => "PPLG XI-2",
            "rayon" => "cicurug 4",
            "umur" => 18
        ]
        ];
    ?>
    <p>Opsi 1 : jika di klik menampilkan data yang memiliki umur => 17</p>
    <p>Opsi 2 : menampilkan data dari nama yang dicari</p><br>
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