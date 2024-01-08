<?php
$siswa= [
    [
        "nama" => "Lara",
        "nis" => "12209321",
        "rombel" => "PPLG XI-7",
        "rayon" => "cipanas 1",
        "usia" => "17"
    ],
    [
        "nama" => "Shoji",
        "nis" => "12209709",
        "rombel" => "PPLG XI-9",
        "rayon" => "cibinong 2",
        "usia" => "18"
    ],
    [
        "nama" => "Navi",
        "nis" => "12209743",
        "rombel" => "PPLG XI-7",
        "rayon" => "cibinong 2",
        "usia" => "16"
    ],
    [
        "nama" => "Geralt",
        "nis" => "12209999",
        "rombel" => "PPLG XI-4",
        "rayon" => "wikrama 3",
        "usia" => "17"
    ]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <ul>
            <li><a href="?usia">Cari siswa yang lebih atau sama 17 tahun</a></li>

            <li><label for="">Cari Nama siswa: </label><input type="text" name="namaSiswa" id="namaSiswa"> <button type="submit" name="submit">Cari</button></li>
        </ul>
    </form>
</body>
</html>
<?php
if (isset($_GET['usia'])) {
    foreach ($siswa as $key) {
        if ($key['usia'] >= 17) {
            echo "Nama: " . $key['nama']. " Umur: ". $key['usia']. "<br>";
        }
    };
}
echo "<br>";
if (isset($_POST['submit'])) {
    $names = $_POST['namaSiswa'];
    foreach ($siswa as $key) {
        if ($names == $key['nama']) {
            echo "Nama: " .$key['nama']. " NIS: ".$key['nis']. " Rombel: ". $key['rombel']. " Rayon: ". $key['rayon']. " Usia: ". $key['usia']. "<br>"; 
        }
    }
    
}
