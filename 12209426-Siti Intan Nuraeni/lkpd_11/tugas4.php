<?php
$siswa = [
    [
        "nama" => "Sutini",
        "nis" => "125555",
        "rombel" => "PPLG XI-1",
        "rayon" => "cibedug",
        "umur" => 17,
    ],
    [
        "nama" => "Sutadi",
        "nis" => "124444",
        "rombel" => "PPLG XI-2",
        "rayon" => "cicurug",
        "umur" => 20,
    ],
    [
        "nama" => "Erlan",
        "nis" => "12333",
        "rombel" => "PPLG XI-3",
        "rayon" => "cisarua",
        "umur" => 3,
    ],
    [
        "nama" => "Burung",
        "nis" => "12222",
        "rombel" => "PPLG XI-4",
        "rayon" => "ciawi",
        "umur" => 16,
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
</head>
<body>
<p><strong>Data Siswa</strong></p>
    <ul>
        <li>
            <a href="?cariUsia">Cari siswa yang lebih dari 17 tahun</a>
        </li>
        <li>
            <form method="post">
                <label for="siswa">Cari siswa berdasarkan nama:</label>
                <input type="text" name="siswa" id="siswa">
                <input type="submit" name="submit" value="Cari">
            </form>
        </li>
    </ul>
</body>
</html>

<?php
if (isset($_GET["cariUsia"])){
    foreach($siswa as $data){
        if($data['umur'] >= 17){
            echo "<li>" . $data['nama'] . ", " . $data['umur'] ." tahun." . "</li>" ;
        }
    }
}?>

<?php
 if(isset($_POST['submit'])) {
    $nama = ($_POST['siswa']);

    foreach($siswa as $data_siswa) {
        if($nama == $data_siswa['nama']) {
            echo "<li>" . $data_siswa['nama'] . " | " . $data_siswa['nis'] . " | " . $data_siswa['rombel'] . " | " . $data_siswa['rayon'] . " | " . $data_siswa['umur'];
        }
    }
 } 
?>