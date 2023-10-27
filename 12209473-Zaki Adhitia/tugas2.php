<?php
$siswa = [
    [
    "nama" => "fema",
    "nis" => "11907154",
    "rombel" => "PPLG XI-2",
    "rayon" => "Cicurug 3",
    "umur" => 18,
],
[
    "nama" => "putri",
    "nis" => "11907155",
    "rombel" => "PPLG XI-2",
    "rayon" => "Ciawi 2",
    "umur"  => 16,
],
[
    "nama" => "putra",
    "nis" => "11907156",
    "rombel" => "PPLG XI-4",
    "rayon" => "Sukasari 2",
    "umur" => 17,
],
[
    "nama" => "arta",
    "nis" => "11907157",
    "rombel" => "PPLG XI-4",
    "rayon" => "Wikrama 4",
    "umur" => 17,
]
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
    <li>Opsi 1: Jika di klik menampilkan data yang memiliki umur >= 17</li>
    <li>Opsi 2: Menampilkan data diri nama yang dicari</li>
    <br>

    <a href="?cari">
        <p>
            Tampilkan Yang berusia 17 tahun
        </p>
    </a>

    <form action="" method="post">
    <input type="text" name="btn" id="input_nama">
    <button type="submit" name="submit">Kirim </button>
</form>



<?php
if (isset($_GET['cari'])) {
    foreach ($siswa as $data => $nama_siswa) {
        if ($nama_siswa["umur"] >=   17) {
            echo $nama_siswa ["nama"] . "<br>";
            echo $nama_siswa ["nis"] . "<br>";
            echo $nama_siswa ["rombel"] . "<br>";
            echo $nama_siswa ["rayon"] . "<br>";
            echo $nama_siswa ["umur"] . "<br> <br>";
        }
    }
}

?>

<?php
//pakai strtolower agar input tetap masuk saat user asal ketik (sunnah):)
if (isset($_POST['submit'])) {
    $nama = $_POST["btn"];
    foreach ($siswa as $nama_siswa) {
       if ($nama == $nama_siswa['nama']) {
            echo $nama_siswa ["nama"]. "<br>";
            echo $nama_siswa ["nis"] . "<br>";
            echo $nama_siswa ["rombel"] . "<br>";
            echo $nama_siswa ["rayon"] . "<br>";
            echo $nama_siswa ["umur"] . "<br> <br>";
       }
    }
}
?>



</body>
</html>

