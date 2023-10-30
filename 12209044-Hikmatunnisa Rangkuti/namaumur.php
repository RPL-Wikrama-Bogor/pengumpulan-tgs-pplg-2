<?php
    $siswa =[
        [
        "nama" => "hikma",
        "nis" => 12209044,
        "rombel" => "PPLG XI-2",
        "rayon" => "tajur-3",
        "umur" => 16,
        ],
        [
        "nama" => "berlian",
        "nis" => 12209011,
        "rombel" => "PPLG XI-2",
        "rayon" => "tajur-4",
        "umur" => 16,
        ],
        [
        "nama" => "enola",
        "nis" => 12209022,
        "rombel" => "PPLG XI-2",
        "rayon" => "tajur-5",
        "umur" => 16,
        ],
        [
        "nama" => "key",
        "nis" => 12209033,
        "rombel" => "PPLG XI-2",
        "rayon" => "tajur-6",
        "umur" => 14,
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
    
<form method="post">
        <ol>
             <li>
                <a href="?umurlebihdari14=1">Cari yang sudah berusia lebih dari 14 tahun</a>
            </li>
            <li>
                <label for="nama">Cari berdasarkan nama:</label>
                <input type="text" name="nama" id="nama">
                <button type="submit" name="submit">Cari</button>
            </li>
        </ol>
    </form>

</body>
</html>
</body>
</html>
<?php
    function umurlebihdari14($siswa) {
    $hasil = [];
    foreach ($siswa as $data){
    if ($data['umur'] > 14) {
        $hasil[] = $data;
    }
}
    return $hasil;
}
    if (isset($_GET['umurlebihdari14']) && ($_GET['umurlebihdari14'] == 1)) {
        $hasil = umurlebihdari14($siswa);
    }

    function carisiswaberdasarkannama($siswa, $nama) {
        $hasil = [];
        foreach ($siswa as $data){
            if (strtolower($data['nama']) == strtolower($nama)) {
                $hasil[] =$data;
            }
    }
    return $hasil;
}

if (isset($_POST['submit'])){
    $namacari = $_POST['nama'];
    if (!empty($namacari)) {
        $hasil=carisiswaberdasarkannama($siswa, $namacari);
    } else {
        $hasil=[];
    }
}
if (isset($hasil)) : ?>
    <h2>Hasil Pencarian:</h2>
    <ul>
        <?php foreach ($hasil as $siswa) : ?>
            <li>
                Nama: <?php echo $siswa['nama']; ?><br>
                Umur: <?php echo $siswa['umur']; ?><br>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; 
?>