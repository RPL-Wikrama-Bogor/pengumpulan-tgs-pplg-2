<?php 
$siswa = [
    [
        "nama" => "agus",
        "nis" => 119796,
        "rombel" => "PPLG XI-2",
        "rayon" => "Cicurug 3",
        "umur" => 18,
    ],
    [
        "nama" => "andi",
        "nis" => 11907679,
        "rombel" => "PPLG XI-3",
        "rayon" => "Sukasari 4",
        "umur" => 16,
    ],
    [
        "nama" => "sugi",
        "nis" => 11907156,
        "rombel" => "PPLG XI-1",
        "rayon" => "cisarua 3",
        "umur" => 17,
    ],
    [
        "nama" => "irma",
        "nis" => 11908627,
        "rombel" => "PPLG XI-6",
        "rayon" => "Cibedug 1",
        "umur" => 17,
    ]
]
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari nama</title>
</head>
<body>
    <p>Opsi 1 :jika di klik menampilkan data yang dimiliki umur >=17</p>
    <p>opsi 2: menampilkan data dari mana yang di cari</p>

    <form action="#" method="post">
       <ul>
        <li>
        <a href="?cari">Cari yang sudah berusia lebih dari 17</a>
        <!-- ?cari=untuk menambahkan parameter baru ke link -->
        </li>   

        <li>
            <div class="display: flex;" >
            <label for="nama-input">Cari berdasarkan nama:</label>
            <input type="text" id="nama-input" name="nama">
            <button type="submit" name="submit">Cari</button>
        </div>
            </li>
       </ul>
    </form>

    <!-- proses -->
        <ol>
            <?php
       if(isset($_GET['cari'])){
           foreach($siswa as $data_siswa) {
               if($data_siswa['umur'] >= 17) {
                echo "<li>".$data_siswa['nama']. $data_siswa['umur']."</li>";
            }

        }
    } 
   ?>
           </ol>    


    <?php
        if(isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            foreach ($siswa as $data_siswa) {
                if($nama == $data_siswa['nama']) {
                    echo "<li>Nama : $nama |";
                    echo "Umur : $data_siswa[umur] |";
                    echo "NIS : $data_siswa[nis] |";
                    echo "Rombel : $data_siswa[rombel] |";
                    echo "Rayon : $data_siswa[rayon] ";
                }
            }
        }
    ?>


</body>
</html>