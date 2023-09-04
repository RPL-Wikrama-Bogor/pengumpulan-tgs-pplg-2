<?php
$no_pegawai;
$no_gologan;
$tanggal;
$bulan;
$tahun;
$no_urutan;
$tanggal_lahir;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #00ffcc, #ff66ff);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 500px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 450px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            padding: 20px;
        }

        .result label {
            font-weight: bold;
        }

        .result p {
            margin: 0;
        }
    </style>


</head>
<body>
<div class="container">
        <h2>Input Data Pegawai</h2>
        <form action="" method="post">
            <div class="input-group">
                <label for="pegawai">No Pegawai</label>
                <input type="number" name="pegawai" required>
            </div>
            <button type="submit" name="submit">Kirim</button>
        </form>

<?php
if (isset($_POST['submit'])) {
    $no_pegawai=$_POST['pegawai'];

    if ($no_pegawai < 11) {
        echo"no pegawai sesuai";
    } else {
        $no_gologan =substr($no_pegawai,0,1);
        $tanggal =substr($no_pegawai,1,2);
        $bulan =substr($no_pegawai,3,2);
        $tahun =substr($no_pegawai,5,4);
        $no_urutan =substr($no_pegawai,9,2);
    }

    if ($bulan == "01") {
        $bulan = "Januari";
    } elseif($bulan == "02"){
        $bulan = "Februari";
    }elseif($bulan == "03"){
        $bulan = "Maret";
    }elseif($bulan == "04"){
        $bulan = "April";
    }elseif($bulan == "05"){
        $bulan = "Mei";
    }elseif($bulan == "06"){
        $bulan = "Juni";
    }elseif($bulan == "07"){
        $bulan = "Juli";
    }elseif($bulan == "08"){
        $bulan = "Agustus";
    }elseif($bulan == "09"){
        $bulan = "September";
    }elseif($bulan == "10"){
        $bulan = "Oktober";
    }elseif($bulan == "11"){
        $bulan = "November";
    }else{
        echo"Desember";
    }
    $tanggal_lahir=$tanggal . "-" . $bulan . "-" .$tahun;
    echo "Nomer golongan : " . $no_gologan;
    echo "</br>";
    echo "Tanggal lahir : " . $tanggal_lahir;
    echo "</br>";
    echo "No Urutan : " . $no_urutan;
}
?>

</body>
</html>