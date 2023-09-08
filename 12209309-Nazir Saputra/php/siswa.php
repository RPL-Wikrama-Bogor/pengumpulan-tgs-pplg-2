<?php

$siswa = [
    [
        "nama" => "Nazir",
        "nis" => 12209309,
        "rombel" => "PPLG XI-2",
        "rayon" => "Cisarua 3",
        "umur" => "17"
    ],
    [
        "nama" => "Fallah",
        "nis" => 12209388,
        "rombel" => "PPLG XI-2",
        "rayon" => "Tajur 4",
        "umur" => "16"
    ],
    [
        "nama" => "Ihsan",
        "nis" => 12209355,
        "rombel" => "PPLG XI-2",
        "rayon" => "Cicurug 2",
        "umur" => "17"
    ],
    [
        "nama" => "Ramon",
        "nis" => 12209364,
        "rombel" => "PPLG XI-2",
        "rayon" => "Cisarua 1",
        "umur" => "16"
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
    <p>Opsi 1:Jika diklik menampilkan data yang memiliki umur>=17
    <br>Opsi 2:menampilkan data dari nama yang dicari</br></p>
        
        <form method="post">
            <input type="hidden" name="option" value="1">
            <input type="submit" value="Cari yang sudah berusia lebih 17 tahun">
        </form>
        <!--  -->
        <!-- Opsi 2: Pencarian berdasarkan nama -->
        <h2>Cari berdasarkan nama:</h2>
        <form method="post">
            <input type="hidden" name="option" value="2">
            <!-- hidden untuk meneymbunyikan suatu atritub kepada user sumber:google -->
            <label for="nama-cari">Nama:</label>
            <input type="text" id="nama-cari" name="nama_cari">
            <input type="submit" value="Cari">
        </form>
<?php
// server adalah variabel super global yang digunakan untuk menampilkan data dari serve salah satunya
//request method adalah format untuk mengetahui metode apa yangdigunak dalam server seperti post atau get

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // isset untuk mengecek tombol option sudah di klik?
       if (isset($_POST["option"])) {
        $option = $_POST["option"];

        if ($option == "1") {
            echo "<h2>Data dengan umur >= 17</h2>";
            $count = 0; // Variabel untuk nomor urutan
            foreach ($siswa as $data) {

                if ($data["umur"] >= 17) {
                    $count++;
                    //count untuk menghitung jumlah item dalam array dan terus ditambahkan
                    echo "<p>$count. nama: " . $data["nama"] . ", umur: " . $data["umur"] . "</p>";
                }
            }
        } elseif ($option == "2") {
            $nama_cari = $_POST["nama_cari"];
            echo "<h2>Data diri untuk Nama: $nama_cari</h2>";
            $found = false;
            //false data boolean
            // Fungsi strcasecmp() digunakan untuk dapat membandingkan dua string
            foreach ($siswa as $data) {
                if (strcasecmp($data["nama"], $nama_cari) == 0) {
                    echo "<p>Nama: " . $data["nama"] . "</p>";
                    echo "<p>NIS: " . $data["nis"] . "</p>";
                    echo "<p>Rombel: " . $data["rombel"] . "</p>";
                    echo "<p>Rayon: " . $data["rayon"] . "</p>";
                    echo "<p>Umur: " . $data["umur"] . "</p>";
                    $found = true;
                    break; // Hentikan pencarian setelah menemukan data pertama
                }
            }
            if (!$found) {
                echo "<p>Data dengan nama $nama_cari tidak ditemukan.</p>";
            }
            // Operator NOT dengan simbol tanda baca seru (!), akan menghasilkan nilai "True" jika salah satu operand bernilai "False". 
        }
    }
}
?>
</body>
</html>

