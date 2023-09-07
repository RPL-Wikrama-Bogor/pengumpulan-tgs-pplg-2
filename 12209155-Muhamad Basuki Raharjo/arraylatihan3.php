<?php
$siswa = [
    [
        "nama" => "Basuki",
        "nis" => "12209155",
        "rombel" => "PPLG XI-2",
        "rayon" => "Cibedug 2",
        "umur" => "16"
    ],
    [
        "nama" => "Yazid",
        "nis" => "12209123",
        "rombel" => "PPLG XI-2",
        "rayon" => "Cisarua 6",
        "umur" => "17"
    ],
    [
        "nama" => "Eka",
        "nis" => "12209123",
        "rombel" => "PPLG XI-2",
        "rayon" => "Tajur 2",
        "umur" => "18"
    ],
    [
        "nama" => "Dwi",
        "nis" => "12209123",
        "rombel" => "PPLG XI-2",
        "rayon" => "Tajur 2",
        "umur" => "17"
    ],
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <ul>
            <li>
                <a href="?cari">Cari yang sudah berusia lebih dari 17 tahun</a>
            </li>
            <li>
                <div style="display: flex;">
                    <label for="nama">Cari berdasarkan nama :</label>
                    <input type="text" name="nama" id="nama">
                    <button type="submit" name="submit">Cari</button>
                </div>
            </li>
        </ul>
    </form>
    

    <?php
    if(isset($_GET['cari'])){
        foreach($siswa as $key => $data_siswa){
            if($data_siswa['umur'] >= 17){
                echo "<ul><li>$data_siswa[nama]|$data_siswa[umur]</li></ul>";
            }
        }
    }
    
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