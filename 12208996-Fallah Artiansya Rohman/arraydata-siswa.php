<?php

$siswa = [
    [
        "nama" => "Fallah",
        "nis" => 12209388,
        "rombel" => "PPLG XI-2",
        "rayon" => "Tajur 4",
        "umur" => 16
    ],
    [
        "nama" => "Nazir",
        "nis" => 12209309,
        "rombel" => "PPLG XI-2",
        "rayon" => "Cisarua 3",
        "umur" => 17
    ],
    [
        "nama" => "Syahdan",
        "nis" => 12209364,
        "rombel" => "PPLG XI-1",
        "rayon" => "Cicurug 1",
        "umur" => 16
    ],
    [
        "nama" => "Azqi",
        "nis" => 12209355,
        "rombel" => "PPLG XI-2",
        "rayon" => "Wikrama 4",
        "umur" => 17
    ],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array func</title>
</head>
<body>
    <p>Opsi 1:Jika diklik menampilkan data yang memiliki umur>=17
    <br>Opsi 2:menampilkan data dari nama yang dicari</br></p>
        
        <form method="post">
            <input type="hidden" name="option" value="1">
            <input type="submit" value="Cari yang sudah berusia lebih 17 tahun">
        </form>
        
        <!-- Opsi 2: Pencarian berdasarkan nama -->
        <h2>Cari berdasarkan nama:</h2>
        <form method="post">
            <input type="hidden" name="option" value="2">
            <!--Type hidden ini bisa digunakan untuk mengirim suatu data dari sebuah halaman
             ke halaman lain tanpa mengganggu bentuk form yang telah ada -->
            <label for="nama-cari">Nama:</label>
            <input type="text" id="nama-cari" name="nama_cari">
            <input type="submit" value="Cari">
        </form>
<?php
// reques untuk Mengembalikan metode permintaan yang digunakan untuk mengakses halaman 
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
       if (isset($_POST["option"])) {
        $option = $_POST["option"];

        if ($option == "1") {
            echo "<h2>Data dengan umur >= 17</h2>";
            $count = 0; // Variabel untuk nomor urutan
            //foreach digunakan untuk perulangan yang datanya dalam bentuk array dan 
            //memungkinkan untuk menampilkan data dari array tanpa variabel counter
            foreach ($siswa as $data) {
                if ($data["umur"] >= 17) {
                    $count++;
                    //count fungsi yang digunakan untuk menghitung jumlah item dalam array. 
                    echo "<p>$count. nama: " . $data["nama"] . ", umur: " . $data["umur"] . "</p>";
                }
            }
            //option digunakan untuk mengatur opsi koneksi tambahan dan mempengaruhi perilaku koneksi.
        } elseif ($option == "2") {
            $nama_cari = $_POST["nama_cari"];
            echo "<h2>Data diri untuk Nama: $nama_cari</h2>";
            $found = false;
            foreach ($siswa as $data) {
                //Fungsi strcasecmp() digunakan untuk dapat membandingkan dua string.
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
        }
    }
}
?>
</body>
</html>