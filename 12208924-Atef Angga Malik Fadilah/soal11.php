<!-- deklarasi -->
<?php
    $no_pegawai;
    $no_golongan;
    $tanggal;
    $bulan;
    $tahun;
    $no_urutan;
    $tanggal_lahir;

    if (isset($_POST["submit"])) {
        $no_pegawai = $_POST['no_pegawai'];

        $no_pegawai = strval($no_pegawai);

        if ( $no_pegawai < 11) {
            echo "No Pegawai tidak sesuai";
        }  
        
        $no_golongan = substr($no_pegawai, 0, 1);
        // ambil angka pertama dari no_pegawai
        $tanggal = substr($no_pegawai, 1, 2);
        // ambil kedua angka dari no_pegawai
        $bulan = substr($no_pegawai, 3, 1);
        // ambil tiga angka dari no_pegawai
        $tahun = substr($no_pegawai, 5, 4 );
        // ambil empat angka dari no_pegawai
        $no_urutan = substr($no_pegawai, 9, 2 ) ;

        if ( $bulan == "01") {
            $bulan = "Januari";
        } else if ( $bulan == "02") {
            $bulan = "Februari";
        } else if ( $bulan == "03") {
            $bulan = "Maret";
        } else if ( $bulan == "04") {
            $bulan = "April";
        } else if ( $bulan == "05") {
            $bulan = "Mei";
        } else if ( $bulan == "06") {
            $bulan = "Juni";
        } else if ( $bulan == "07") {
            $bulan = "Juli";
        } else if ( $bulan == "08") {
            $bulan = "Agustus";
        } else if ( $bulan == "09") {
            $bulan = "September";
        } else if ( $bulan == "10") {
            $bulan = "Oktober";
        } else if ( $bulan == "11") {
            $bulan = "November";
        } else {
            $bulan = "Desember";
        }

        $tanggal_lahir = $tanggal . " " . $bulan . " " . $tahun;

    }

?>

<!-- Input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Pegawai</title>
     <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url(bgsoal11.png);
            background-repeat: no-repeat;
            background-size: 50%;
            
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 30px;
            padding-top: 1.5rem;
            padding-bottom: -10px;
            margin-top: -20px;
            margin-left: -20px;
            color: white;
            width: 109%;
            border-radius: 20px 20px 0px 0px;
            height: 60px;
            max-width: 120%;
            background: -webkit-linear-gradient(right, #279EFF, #7091F5, #793FDF);
        }
        

        form {
            width: 35%;
            background: #fff;
            float: right;
            margin-right: 7rem;
            margin-top: 9rem;
            padding: 20px;
            border-radius: 20px;
            font-weight: 600;
            box-shadow: 5px 5px 25px skyblue;
            
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            background: -webkit-linear-gradient(right, #279EFF, #7091F5, #793FDF);
        }
        span{
            color: #793FDF;
        }
        @media (max-width:1050px) {
            h1{
                width: 115%;
            }
        }
        @media (max-width:740px) {
            body{
                background-size: cover;
            }
            h1{
                width: 118%;
                font-size: 25px;
            }
        }
        @media (max-width:500px) {
            
            form{
                width: 200px;
                margin-right: 4rem;
            }
            h2{
                width: 350px;
            }
        }
        </style>
</head>
<body>
    <center>
<form action="" method="post">
    <h1>Data Pegawai</h1>
        <div class="input" style="display: flex;">
        <label for="no_pegawai">No pegawai</label>
        <br>
        <input type="text" name="no_pegawai" id="no_pegawai">
        </div>
        <br>

            <button type="submit" name="submit"><b>Kirim</b></button> <br><br>  
            <?php
        if (isset($_POST["submit"])) {
            echo "<p>No Pegawai : <span>" .  $no_pegawai;
            echo "</span><br>";
            echo " No Golongan : <span>" . $no_golongan;
            echo "</span><br>";
            echo " Tanggal Lahir : <span>" . $tanggal_lahir;
            echo "</span><br>";
            echo " No Urutan : <span>" . $no_urutan . "</span></p>";
        }
        ?>
    </form>
</center>
</body>
</html>

<?php

?>