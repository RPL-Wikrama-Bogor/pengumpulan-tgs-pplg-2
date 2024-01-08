<?php
 $datas = [
    [
        "nama" => "fema",
        "nis" => 11907154,
        "rombel" => "PPLG XI-2",
        "rayon" => "cicurug 3",
        "umur" => 18
    ],
    [
        "nama" => "reyfal",
        "nis" => 10097989,
        "rombel" => "PPLG XI-2",
        "rayon" => "cicurug 1",
        "umur" => 16
    ],
    [
        "nama" => "tedi",
        "nis" => 11093498,
        "rombel" => "PPLG XI-9",
        "rayon" => "cibedug 8",
        "umur" => 17
    ],
    [
        "nama" => "surya",
        "nis" => 10909890,
        "rombel" => "PPLG XI-10",
        "rayon" => "tajur 9",
        "umur" => 19
    ]

];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data siswa</title>
</head>
<body>
    <form action="" method="post">
    <p>opsi 1 : jika di klik menampilkan data yang memiliki umur>=17</P>
    <p>opsi2 : menampilkan data diri nama yang dicari</p>
    <ul>
        <li>
            <a href="?kirim">Cari yang sudah berusia lebih dari 17 tahun </a>
        </li>
        <li>
            <label for="nama">Cari berdasarkan nama :</label>
            <input type="text" name="nama" id="nama">
            <button type="submit" name="submit">Cari</button>
        </li>
    </ul>
</form>
<?php 

    if (isset($_GET['kirim'])) { 
    foreach ($datas as $data) {
        if ($data['umur'] >= 17) {
            echo "Nama: " . $data['nama'] . ", Umur: " . $data['umur'] . "<br><br>";
        }
    }
}
?>
<?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        foreach($datas as $key => $data_diri){
        if ($nama == $data_diri['nama']) {
            echo "nama : $nama <br>";
            echo "nis : $data_diri[nis]<br>";
            echo "rombel : $data_diri[rombel]<br>";
            echo "rayon : $data_diri[rayon]<br>";
            echo "umur : $data_diri[umur]";
        }
    }
}
?>
</body>
</html>

