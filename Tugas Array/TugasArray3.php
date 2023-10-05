<?php

    $siswa = [
        [
            "nama" => "Fema",
            "nis" => 11907154,
            "rombel" => "PPLG XI-2",
            "rayon" => "Cicurug 3",
            "umur" => 18
        ],
        
        [
            "nama" => "Putri",
            "nis" => 11907155,
            "rombel" => "PPLG XI-2",
            "rayon" => "Ciawi 1",
            "umur" => 16
        ],
        [
            "nama" => "Putra",
            "nis" => 11907156,
            "rombel" => "PPLG XI-4",
            "rayon" => "Sukasari 2",
            "umur" =>17
        ],
        [
            "nama" => "Arta",
            "nis" => 11907157,
            "rombel" => "PPLG XI-4",
            "rayon" => "Wikrama 4",
            "umur" => 17
        ],
        [
            "nama" => "Ikbal",
            "nis" => 12209175,
            "rombel" => "PPLG XI-2",
            "rayon" => "Cicurug 3",
            "umur" => 16
        ],
        [
            "nama" => "Hasan",
            "nis" => 12209191,
            "rombel" => "PPLG XI-2",
            "rayon" => "Cicurug 6",
            "umur" => 17
        ],
    ]

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mencari Siswa</title>
    <style>
        body{
            background-color: salmon;
            font-family: Arial, Helvetica, sans-serif;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.2);   
        }
        th, td{
            border: 1px solid black;
            padding: 10px;
            font-size: 15px;
            font-weight: bold;
            color: black;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-sizing: border-box;
        }

        a{
            background-color: bisque;
            color: black;
            padding: 10px;
            text-decoration: none;
            border-radius: 20px;                  
            background-image: linear-gradient(45deg, bisque, salmon, bisque, salmon);      
        }        
        
        a:hover{
            background-image: linear-gradient(45deg, salmon, bisque, salmon, bisque);
        }

        .cari{
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid black;
            border-radius: 5px;
            background-color: white;
        }
    </style>
</head>
<body>

<table border="1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIS</th>
            <th>Rombel</th>
            <th>Rayon</th>
            <th>Umur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($siswa as $s) :?>
        <tr>
            <td><?= $s['nama']?></td>
            <td><?= $s['nis']?></td>
            <td><?= $s['rombel']?></td>
            <td><?= $s['rayon']?></td>
            <td><?= $s['umur']?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

    <div class="content">
    <h1>Mencari Siswa</h1>
    <form action="" method="get">
        <p><a href="?cari">Cari yang sudah berusia lebih dari 17 tahun</a></p>
        <ol>
        <?php 
      
        if (isset($_GET['cari'])) {
            foreach ($siswa as $key => $murid) {
                if ($murid['umur'] >= 17) {
                    echo "<li>$murid[nama] : $murid[umur]</li><br>";
                }
            }
        }

        ?>
        </ol>
    </form>

    <div class="cari">
    <form action="" method="post">
        <label for="nama">Cari Berdasarkan Nama : </label>
        <input type="text" name="nama" id="nama">
        <button type="submit" name="subnama">Cari</button>

        </form>

        <?php
        if(isset($_POST['subnama'])){
            $nama = $_POST['nama'];
            foreach($siswa as $key => $murid){
                $key += 1;
                if($nama == $murid['nama'] || $nama == strtoupper($murid['nama']) || $nama == strtolower($murid['nama'])) {
                    
                    echo "<br><b>".$key.". ".$nama." | ".$murid['umur']." | ".$murid['nis']." | ".$murid['rombel']." | ".$murid['rayon']."</b><br>";
                }
            } 
        }

    ?>

    <br>

    <form action="" method="post">
        <label for="nis">Cari Berdasarkan Nis : </label>
        <input type="text" name="nis" id="nis">
        <button type="submit" name="subnis">Cari</button>

        </form>

        <?php
        if(isset($_POST['subnis'])){
            $nis = $_POST['nis'];
            foreach($siswa as $key => $murid){
                $key += 1;
                if($murid['nis'] == $nis ){
                    
                    echo "<br><b>".$key.". ".$nis." | ".$murid['umur']." | ".$murid['nis']." | ".$murid['rombel']." | ".$murid['rayon']."";
                }
            }
        }
        ?>
        </div>
    </div>

</body>
</html>