<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>

    //aldo
    <style>
        body {
            background-color: #9EB384;
            font-family: 'sans-serif';
            justify-content: center;
            align-items: center;
            padding-top: 50px;

        }

        form {
            background-color: #F8F6F4;
            border-radius: 15px;
            padding: 50px;

            box-shadow: 16px 13px 20px -14px rgba(147, 235, 43, 0.66) inset;
            -webkit-box-shadow: 16px 13px 20px -14px rgba(147, 235, 43, 0.66) inset;
            -moz-box-shadow: 16px 13px 20px -14px rgba(147, 235, 43, 0.66) inset;

            width: 300px;
            margin-bottom: 30px;



            margin: 0 auto;
            /* Menengahkan elemen horizontal */
            position: absolute;
            top: 20px;
            /* Mengatur jarak dari atas */
            left: 0;
            right: 0;
        }

        .input1 input {

            border-radius: 10px;
            margin-left: 20px;
            margin-bottom: 13px;
            padding: 8px 8px 5px;
            /* border: none; */
            border-color: #94ff11;
            flex-wrap: wrap;


        }

        .input input {

            border-radius: 10px;
            margin-left: 20px;
            padding: 6px 6px 4%;
            margin-top: 2px;
            /* border: none; */
            border-color: #94ff11;
            flex-wrap: wrap;
            background-color: #94ff11;
            font-weight: bold;


        }

        form h2 {
            margin-top: -25px;
            margin-bottom: 40px;
        }


        label {
            margin-bottom: 15px;
            border-radius: 30px;
            font-weight: bold;
        }



        .output {

            background-color: white;
            border-radius: 15px;
            padding: 20px 50px 50px;

            box-shadow: -21px -18px 20px -14px rgba(147, 235, 43, 0.66) inset;
            -webkit-box-shadow: -21px -18px 20px -14px rgba(147, 235, 43, 0.66) inset;
            -moz-box-shadow: -21px -18px 20px -14px rgba(147, 235, 43, 0.66) inset;

            width: 300px;
            height: 250px;
            /* margin-bottom: 300px; */


            margin: 0 auto;
            /* Menengahkan elemen horizontal */
            position: absolute;
            top: 220px;
            /* Mengatur jarak dari atas */
            left: 0;
            right: 0;

        }

        .rincian {
            /* font-weight: bold; */
            text-align: center;
            margin-top: 30px;

        }

        .golongan{
            font-weight: bold;
        }

        .tanggal{
            font-weight: bold;
        }

        .urutan{
            font-weight: bold;
        }
    </style>

</head>

<body>

    <form action="" method="post">


        <div class="card">

            <div style="text-align: center;">
                <h2>Inputkan no pegawai : </h2>
            </div>


            <div style=" display: flex; ">
                <div class="input1">
                    <label for="no_pegawai"></label>
                    <input type="number" placeholder="Tuliskan disini.." name="no_pegawai" id="no_pegawai">
                </div>


                <div class="input">
                    <label for="submit"></label>
                    <input type="submit" name="submit" id="submit">
                </div>
            </div>


    </form>




</body>

</html>

<?php

$no_pegawai;
$no_urutan;
$no_golongan;

$tanggal;
$tanggal_lahir;
$bulan;
$tahun;


if (isset($_POST['submit'])) {
    $no_pegawai = $_POST['no_pegawai'];



    if ($no_pegawai < 11) {
        echo "No pegawai tidak sesuai";
    } else {
        $no_golongan = substr($no_pegawai, 0, 1);
        $tanggal = substr($no_pegawai, 1, 2);
        $bulan = substr($no_pegawai, 3, 2);
        $tahun = substr($no_pegawai, 5, 4);
        $no_urutan = substr($no_pegawai, 9, 2);
    }
    if ($bulan == "01") {
        $bulan = "Januari";
    } elseif ($bulan == "02") {
        $bulan = "Februari";
    } elseif ($bulan == "03") {
        $bulan = "Maret";
    } elseif ($bulan == "04") {
        $bulan = "April";
    } elseif ($bulan == "05") {
        $bulan = "Mei";
    } elseif ($bulan == "06") {
        $bulan = "Juni";
    } elseif ($bulan == "07") {
        $bulan = "Juli";
    } elseif ($bulan == "08") {
        $bulan = "Agustus";
    } elseif ($bulan == "09") {
        $bulan = "September";
    } elseif ($bulan == "10") {
        $bulan = "Oktober";
    } elseif ($bulan == "11") {
        $bulan = "November";
    } else {
        $bulan = "Desember";
    }


    $tanggal_lahir = $tanggal . "-" . $bulan . "-" . $tahun;


    echo '<div class = "output">' .

        '<div class = "rincian">' . "<H2>Rincian</H2>" . '</div>' .


        '<div class = "golongan">' . " Nomer golongan : " . $no_golongan . '</div>' .

        "</br>" .
        "<======================>" .
        "</br>" .
        "</br>" .

        '<div class = "tanggal">' . " Tanggal lahir : " .  $tanggal_lahir . '</div>' .
        "</br>" .

        "<======================>" .
        "</br>" .
        "</br>" .

        '<div class = "urutan">' . " Nomer urutan : " . $no_urutan . '</div>' .

        '</div>';
}


?>