<?php
$siswa = [
    [
        "nama" => "jeonghan",
        "nis" => 12208984,
        "rombel" => "PPLG XI-2",
        "rayon" => "tajur 11",
        "umur" => 18,
    ],
    [
        "nama" => "wonwoo",
        "nis" => 17071996,
        "rombel" => "PPLG XI-2",
        "rayon" => "wikrama 12",
        "umur" => 17,
    ],
    [
        "nama" => "soonyoung",
        "nis" => 15071996,
        "rombel" => "PPLG XI-2",
        "rayon" => "cisarua 13",
        "umur" => 17,
    ],
    [
        "nama" => "mingyu",
        "nis" => 12204567 ,
        "rombel" => "PPLG XI-2",
        "rayon" => "cicurug 15",
        "umur" => 15,
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D</title>
</head>
<body>
    <form action="" method="post">
        <a href="?cari">Cari yang sudah berusia lebih dari 17</a>
        </div>
        <br>
            <label for="nama">Cari berdasarkan nama :</label>
            <input type="text" name="nama">
            <button type="submit" name="submit" >cari</button>
    </form>
    <?php 
    if(isset($_GET['cari'])) {
       foreach($siswa as $data_siswa) {
           if($data_siswa['umur'] >= 17) {
               echo "<li>". $data_siswa['nama'] . $data_siswa['umur'] ."</li>";
            }
       }
    }

   ?>
  
  <?php
    if(isset($_POST['submit'])) {
        $nama = ($_POST['nama']);

        foreach ($siswa as $data_siswa) {
            if($nama == $data_siswa['nama'] || $nama == $data_siswa['nama']) {
                echo "Nama : $nama <br>";
                echo "umur : $data_siswa[umur]";
            }
        }
    }
  ?>
    
    
</body>
</html>