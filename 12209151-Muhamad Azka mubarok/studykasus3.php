<?php 

$siswa =[
        [
            "nama" => "Dudan",
            "nis" => 12209252,
            "rombel" => "PPLG XI-2",
            "rayon" => "cisarua 3",
            "umur" => 18,
        ],
        [
            "nama" => "Sukri",
            "nis" => 12209353,
            "rombel" => "PPLG XI-2",
            "rayon" => "wikrama 2",
            "umur" => 15,
        ],
        [
            "nama" => "Agus",
            "nis" => 12209555,
            "rombel" => "PPLG XI-2",
            "rayon" => "tajur 6",
            "umur" => 17,
        ],
        [
            "nama" => "Ruli",
            "nis" => 12209656,
            "rombel" => "PPLG XI-2",
            "rayon" => "cicurug 2",
            "umur" => 16,
        ],
        [
            "nama" => "Ade",
            "nis" => 12209757,
            "rombel" => "PPLG XI-2",
            "rayon" => "cibedug 3",
            "umur" => 17,
        ],
        [
            "nama" => "Andi",
            "nis" => 12209858,
            "rombel" => "PPLG XI-2",
            "rayon" => "sukasari 2",
            "umur" => 16,
        ],
        [
            "nama" => "Sugi",
            "nis" => 12209959,
            "rombel" => "PPLG XI-2",
            "rayon" => "Ciawi",
            "umur" => 17,
        ],
    
];

if (isset($_GET["cari_umur"])) {
    echo "<h2>Data Siswa yang Berumur 17 Tahun ke Atas:</h2>";

    foreach ($siswa as $data) {
        if ($data["umur"] >= 17) {
            echo "<h3><ol><li>Nama: " . $data["nama"] . "</li></ol></h3>";
            echo "NIS: " . $data["nis"] . "<br>";
            echo "Rombel: " . $data["rombel"] . "<br>";
            echo "Rayon: " . $data["rayon"] . "<br>";
            echo "Umur: " . $data["umur"] . " tahun<br><br>";
        }
    }
} elseif (isset($_POST["cari_nama"])) {
    $cari_nama = strtolower($_POST["cari_nama"]);
    echo "<h2>Hasil Pencarian Siswa dengan Nama $cari_nama:</h2>";
    foreach ($siswa as $data) {
        if (strpos(strtolower($data["nama"]), $cari_nama) !== false) {
            echo "<h3>Nama: " . $data["nama"] . "</h3>";
            echo "NIS: " . $data["nis"] . "<br>";
            echo "Rombel: " . $data["rombel"] . "<br>";
            echo "Rayon: " . $data["rayon"] . "<br>";
            echo "Umur: " . $data["umur"] . " tahun<br><br>";
            foreach ($variable as $key => $value) {
                # code...
            }
        }
    }
}

?>

<h2>Data Siswa</h2>

<form method="post">
    <ul>
        <li><a href="?cari_umur=18">Cari Siswa yang sudah umur 17 Tahun ke Atas</a><br>
            <label for="cari_nama">Cari Siswa berdasarkan Nama:</label>
            <input type="text" id="cari_nama" name="cari_nama">
            <button type="submit" name="submit_cari_nama">Cari nama</button>
        </li>
    </ul>
</form>

