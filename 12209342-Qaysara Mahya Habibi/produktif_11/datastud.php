<?php
$siswa = [
    [
        "nama" => "ryo",
        "nis" => "129087",
        "rombel" => "PPLG XI-5",
        "rayon" => "Cicurug",
        "umur" => 17
    ],
    [
        "nama" => "pinpin",
        "nis" => "125389",
        "rombel" => "PPLG XI-2",
        "rayon" => "Cisarua",
        "umur" => 20
    ],
    [
        "nama" => "lanlan",
        "nis" => "126854",
        "rombel" => "PPLG XI-4",
        "rayon" => "Ciawi",
        "umur" => 14
    ],
    [
        "nama" => "riska",
        "nis" => "126307",
        "rombel" => "PPLG XI-1",
        "rayon" => "Wikrama",
        "umur" => 18
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
<H2>CARI SISWA</H2>
    <ul>
        <li>
            <a href="?cariUsia">Cari siswa yang lebih dari 17 tahun</a>
        </li>
        <li>
            <form method="post">
                <label>Cari siswa berdasarkan nama:</label>
                <input type="text" name="nama">
                <input type="submit" name="submit" value="Cari">
            </form>
        </li>
    </ul>
</body>
</html>

<?php
if (isset($_GET["cariUsia"])){
    foreach($siswa as $key => $data){
        if($data['umur'] >= 17){
            echo "<li>" . $data['nama'] . ", " . $data['umur'] ." tahun." . "</li>" ;
        }
    }
}?>

<?php
 if(isset($_POST['submit'])) {
    $nama = ($_POST['nama']);

    foreach($siswa as $data_siswa) {
        if($nama == $data_siswa['nama']) {
            echo "<li>" . $data_siswa['nama'] . " | " . $data_siswa['nis'] . " | " . $data_siswa['rombel'] . " | " . $data_siswa['rayon'] . " | " . $data_siswa['umur'];
        }
    }
 } 
?>