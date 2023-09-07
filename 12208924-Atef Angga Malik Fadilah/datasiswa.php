<?php 

    $siswa = [
        [
            "nama" => "atef",
            "nis" => 12208924,
            "rombel" => "PPLG XI 2",
            "rayon" => "Cicurug 1",
            "umur" => 17
        ],
        [
            "nama" => "sigit",
            "nis" => 12209220,
            "rombel" => "PPLG XI 3",
            "rayon" => "Wikrama 3",
            "umur" => 16
        ],
        [
            "nama" => "zaki",
            "nis" => 12209900,
            "rombel" => "PPLG XI 4",
            "rayon" => "Cicurug 1",
            "umur" => 18
        ],
        [
            "nama" => "ihsan",
            "nis" => 12209111,
            "rombel" => "PPLG XI 2",
            "rayon" => "Cicurug 2",
            "umur" => 15
        ],
        [
            "nama" => "alfin",
            "nis" => 12209123,
            "rombel" => "PPLG XI 5",
            "rayon" => "Cicurug 4",
            "umur" => 17
        ]
     
        ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data siswa</title>
    <style>
        li{
            list-style: none;
        }
    </style>
</head>
<body>
    <p>opsi 1 : jika di klik menampilkan data yang memiliki umur>=17</p>
    <p>opsi 2 : menampilkan data diri nama yang dicari</p><br>

    <form action="" method="post">
        <ul>
            <li><a href="?cari" type="submit" name="umurLebih">Cari yang sudah berusia lebih dari 17</a></li><br>
            <li>Cari Berdasarkan nama : <input type="text" name="nama" autocomplete="off">
            <button type="submit" name="submit">Cari</button></li>
        </ul>
    </form><br>

    <?php 
        if(isset($_GET["cari"])){
            foreach($siswa as $dataSiswa => $data) {
                if($data["umur"] >= 17){
                    echo "Nama : " . ucwords($data["nama"]) . "<br>";
                    echo "Umur : " . $data["umur"] . "<br>";
                }
            }
        }
    ?><br>

    <?php 
        if(isset($_POST["submit"])) {
            $nama = strtolower($_POST["nama"]);
            foreach($siswa as $dataSiswa){
                if($nama == $dataSiswa["nama"]){
                    echo "Nama : " . ucwords($dataSiswa["nama"]) . "<br>";
                    echo "Nis : " . $dataSiswa["nis"] . "<br>";
                    echo "Rombel : " . $dataSiswa["rombel"] . "<br>";
                    echo "Rayon : " . $dataSiswa["rayon"] . "<br>";
                    echo "Umur : " . $dataSiswa["umur"] . "<br>";
                }
            }
        }
    ?>
    
</body>
</html>