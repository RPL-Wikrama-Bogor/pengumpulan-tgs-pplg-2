<?php


$siswa = [
    [
        "nama" => "Aldo",
        "nis" => "12208880",
        "rombel" => "PPLG XI_2",
        "rayon" => "CIcurug-2",
        "umur" => "18",
    ],



    [
        "nama" => "ok",
        "nis" => "12208880",
        "rombel" => "PPLG XI_2",
        "rayon" => "CIcurug-2",
        "umur" => "19",
    ],

    [
        "nama" => "aldi",
        "nis" => "12208880",
        "rombel" => "PPLG XI_2",
        "rayon" => "CIcurug-2",
        "umur" => "15",
    ],
];

?>

<!DOCTYPE html>
<html>

<head>
</head>

<body>


    <form method="post">


        <h2>Pilih Opsi Pencarian</h2>
        <ul>
            <li>
                <a href="?cek=usia">Cari berdasarkan Usia lebih dari 17 tahun</a>
            </li>
            <!-- <li><a href="?cek=nama">Cari berdasarkan Nama</a></li> -->



            <li style="display: flex;">

                <div>
                    <p>cari berdasarkan nama : </p>
                </div>

                <div>
                    <label for="nama"></label>
                    <input type="text" id="nama" name="nama" style="margin-top: 16px;">
                    <button type="submit" name="kirim"> submit </button>
                </div>

            </li>


        </ul>




        <?php
        if (isset($_GET['cek'])) {
            $cek = $_GET['cek'];
            if ($cek == 'usia') {

                echo "Siswa yang umurnya lebih dari 17 :" . "</br>". "</br>";

                foreach ($siswa as $sis) {
                    if ($sis['umur'] >= 17) {

                        echo "Nama " . $sis['nama'] . "</br>";
                        echo "nis " . $sis['nis'] . "</br>";
                        echo "rombel " . $sis['rombel'] . "</br>";
                        echo "rayon " . $sis['rayon'] . "</br>";
                        echo "umur " . $sis['umur'] . "</br>" . "</br>" . "</br>";
                    }
                }
            }
        }


        ?>


        <?php

        if (isset($_POST['kirim'])) {
            $nama = strtolower($_POST['nama']);

            echo "Nama siswa yang dicari :" . "</BR>";

            foreach ($siswa as $sis) {
                if ($nama == strtolower($sis['nama'])) {

                    echo "Nama : " . $sis['nama'] . "</br>";
                    echo "nis " . $sis['nis'] . "</br>";
                    echo "rombel " . $sis['rombel'] . "</br>";
                    echo "rayon " . $sis['rayon'] . "</br>";    
                    echo "umur " . $sis['umur'] . "</br>" . "</br>" . "</br>";

                }
            }
        }


        ?>




</body>

</html>