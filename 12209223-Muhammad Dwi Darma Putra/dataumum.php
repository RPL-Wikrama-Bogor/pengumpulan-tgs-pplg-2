<?php
$siswa = [
    [
        "nama" => "dwi",
        "nis" => "12109872",
        "rombel" => "PPLG XI-2",
        "rayon" => "Tajur 1",
        "umur" => "16",
    ],
    [
        "nama" => "eka",
        "nis" => "10988711",
        "rombel" => "PPLG XI-2",
        "rayon" => "Tajur 1",
        "umur" => "16",
    ],
    [
        "nama" => "hidayah",
        "nis" => "12310534",
        "rombel" => "PPLG XI-2",
        "rayon" => "Ciawi 3",
        "umur" => "17",
    ]
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Umum</title>
</head>
<body>
    <form action="" method="post">
        <ul>
            <h3>opsi1:jika di klik menampilkan data yang memiliki umur>=17</h3>
            <h3>opsi2:menampilkan data dari mana yang dicari</h3>
            <li>
                <a href="?cari" style="text-decoration: none;">Cari yang sudah berusia lebih dari 17 tahun</a>
            </li>
            <li>
                <div style="display: flex;">
                    <label for="angka-pertama">Cari berdasarkan nama:</label>
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
                echo"<ul><li>$data_siswa[nama]$data_siswa[umur]</li></ul>";
            }
        }
    }
    ?>
    <?php
    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        foreach($siswa as $key => $data_siswa){
            if($nama == $data_siswa['nama']){
                echo "Nama: $nama<br>";
                echo "Nis: $data_siswa[nis]<br>";
                echo "Rombel: $data_siswa[rombel]<br>";
                echo "Rayon: $data_siswa[rayon]<br>";
                echo "Umur: $data_siswa[umur]<br>";
            }
        }
    }
    ?>
</body>
</html>    