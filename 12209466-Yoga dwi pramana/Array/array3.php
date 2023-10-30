<?php 
$siswa = [
    [
        "nama" => "Fema",
        "nis" => 11907154,
        "rombel" => "PPLG XI-2",
        "rayon" => "Cicurug 3",
        "umur" => 18,
    ],
    [
        "nama" => "Putri",
        "nis" => 11907155,
        "rombel" => "PPLG XI-4",
        "rayon" => "Sukasari 4",
        "umur" => 16,
    ],
    [
        "nama" => "Andi",
        "nis" => 11907156,
        "rombel" => "PPLG XI-5",
        "rayon" => "Cibedug 5",
        "umur" => 17,
    ],
    [
        "nama" => "Agus",
        "nis" => 11907157,
        "rombel" => "PPLG XI-6",
        "rayon" => "Ciawi 1",
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
        </li>   

        <li>
            <div class="display: flex;" >
            <label for="name">Cari berdasarkan nama:</label>
            <input type="text" name="nama">
            <button type="submit" name="submit">Cari</button>
        </div>
            </li>
       </ul>
    </form>

    <!-- proses -->
        <ol>
            <?php
       if(isset($_GET['cari'])){
           foreach ($siswa as $data_siswa) {
               if($data_siswa['umur'] >= 17) {
                echo "<li>".$data_siswa['nama']. $data_siswa['umur']."</li>";
            }
           
        }
    } 
   ?>
           </ol>


    <?php
        if(isset($_POST['submit'])) {
            $nama = ($_POST['nama']);

            foreach ($siswa as $key => $data_siswa) {
                if ($nama == $data_siswa['nama'] || $nama == strtolower($data_siswa['nama'])) {
                    echo "<li>Nama : $nama |";
                    echo "Umur : $data_siswa[umur] |";
                    echo "NIS : $data_siswa[nis] |";
                    echo "Rombel : $data_siswa[rombel] |";
                    echo "Rayon : $data_siswa[rayon] |";
                }
            }
        }
    ?>
</body>
</html>


