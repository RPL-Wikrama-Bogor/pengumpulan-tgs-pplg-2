<?php
$siswa = [
    [
        "nama" => "berlian",
        "nis" => "12208941",
        "rombel" => "pplg xi-2",
        "rayon" => "tajur 1",
        "umur" => "16",
    ],
    [
        "nama" => "hikma",
        "nis" => "12208942",
        "rombel" => "pplg xi-2",
        "rayon" => "tajur 3",
        "umur" => "16",

    ],
    [
        "nama" => "lisma",
        "nis" => "12208943",
        "rombel" => "pplg xi-4",
        "rayon" => "cisarua 3",
        "umur" => "16",
    ],
    [
        "nama" => "enola",
        "nis" => "12208944",
        "rombel" => "pplg xi-2",
        "rayon" => "tajur 2",
        "umur" => "16",
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
    
<form method="post">
        <ol>
             <li>
                <a href="?UmurYangLebihDari15=1">Cari Yang Sudah Berusia Lebih Dari 15 Tahun</a> 
            </li>
            <li>
                <label for="nama">cari berdasarkan nama:</label>
                <input type="text" name="nama" id="nama">
                <button type="submit" name="submit">cari</button>
            </li>
        </ol>
    </form>

</body>
</html>
</body>
</html>
<?php
    function UmurYangLebihDari15($siswa) {
    $hasil = [];
    foreach ($siswa as $data){
    if ($data['umur'] > 15) {
        $hasil[] = $data;
    }
}
    return $hasil;
}
    if (isset($_GET['UmurYangLebihDari15']) && ($_GET['UmurYangLebihDari15'] == 1)) {
        $hasil = UmurYangLebihDari15($siswa);
    }

    function carisiswaberdasarkannama($siswa, $nama) {
        $hasil = [];
        foreach ($siswa as $data){
            if (strtolower($data['nama']) == strtolower($nama)) {
                //untuk meratakan huruf tidak kapital
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
</body>
</html>c:\Users\berli\AppData\Local\Packages\5319275A.WhatsAppDesktop_cv1g1gvanyjgm\TempState\37BB803FBA5C4ED939D68A30B1D0D867\WhatsApp Image 2023-09-18 at 10.29.23.jpg