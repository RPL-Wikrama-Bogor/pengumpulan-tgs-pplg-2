<?php
$siswa = [
    [
        "nama" => "Hasan",
        "nis" => 12209191,
        "rombel" => "PPLG XI-2",
        "rayon" => "Cicurug 6",
        "umur" => 17,
    ],
    [
        "nama" => "Rizki",
        "nis" => 12209192,
        "rombel" => "PPLG XI-3",
        "rayon" => "Cicurug 7",
        "umur" => 17,
    ],
    [
        "nama" => "Ujang",
        "nis" => 12209193,
        "rombel" => "PPLG XI-4",
        "rayon" => "Cicurug 8",
        "umur" => 19,
    ],
    [
        "nama" => "Jamal",
        "nis" => 12209194,
        "rombel" => "PPLG XI-5",
        "rayon" => "Cicurug 9",
        "umur" => 16,
    ],
    [
        "nama" => "Udin",
        "nis" => 12209195,
        "rombel" => "PPLG XI-6",
        "rayon" => "Cicurug 10",
        "umur" => 15,
    ],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Mencari Nama</title>
    <style>
        body {
            margin: 2%;
        }
    </style>
</head>

<body>
    <p>Opsi 1 : Jika di klik menampilkan data yang memiliki umur >= 17</p>
    <p>Opsi 2 : Menampilkan data dari nama yang dicari</p>

    <form action="" method="post">
        <ul>
            <li><a href="?cari">Cari yang sudah berusia lebih dari 17 tahun</a></li>
            <li>Cari berdasarkan nama : <input type="text" name="nama"><button type="submit" name="kirim">Kirim</button></li>
        </ul>
    </form>

    <ol>
    <?php 
        if (isset($_GET["cari"])) {
            foreach ($siswa as $key => $data_siswa) {
                if ($data_siswa["umur"] >= 17) {
                    echo "<li>$data_siswa[nama] | $data_siswa[umur] </li><br>";
                }
            }
        }
    ?>
    </ol>

    <?php
    if (isset($_POST["kirim"])) {
        $nama = $_POST["nama"];

        echo "<ol>";
        foreach ($siswa as $key => $data_siswa) {
            if ($nama == $data_siswa['nama']) {
                echo "<li> $nama | ";
                echo "$data_siswa[umur] | ";
                echo "$data_siswa[nis] | ";
                echo "$data_siswa[rombel] | ";
                echo "$data_siswa[rayon] </li>";
            }
        }
        echo "</ol>";
    }
    ?>

</body>

</html>