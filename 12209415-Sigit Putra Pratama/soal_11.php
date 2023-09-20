<!-- deklarasi -->
<?php
$no_pegawai;
$no_golongan;
$tanggal;
$bulan;
$tahun;
$no_urutan;
$tanggal_lahir;
?>

<!-- Input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Bulan</title>
     <style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #007bff;
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .result {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        </style>
</head>
<body>
<form action="" method="post">
    <h1>Data Pegawai</h1>
        <div style="display: flex;">
        <label for="no_pegawai">No pegawai</label>
        <br>
        <input type="text" name="no_pegawai" id="no_pegawai">
        </div>
        <br>
        <button type="submit" name="submit">Kirim</button>       
    </form>
</body>
</html>

<?php
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
         $bulan = "Fenruari";
    } else if ( $bulan == "03") {
         $bulan = "maret";
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

    echo "No Pegawai " .  $no_pegawai;
    echo "<br>";
    echo " No Golonngan " . $no_golongan;
    echo "<br>";
    echo " Tanggal Lahir " . $tanggal_lahir;
    echo "<br>";
    echo " No Urutan " . $no_urutan;
}
?>