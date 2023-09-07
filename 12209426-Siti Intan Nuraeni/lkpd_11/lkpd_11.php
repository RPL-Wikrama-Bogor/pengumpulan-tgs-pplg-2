<?php
$no_pegawai;
$no_golongan;
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
            background-color: #FFE5E5;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 8px 15px;
            background-color: #FFC6AC;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #E48586;
        }
    </style>
</head>
<body>
    <div class="container"> 
    <h1>Informasi Pegawai</h1>

    <form action="" method="post">
        <div class="card" style="display: flex;">
            <label for="pegawai">Nomor Pegawai</label>
            <input type="number" name="pegawai" id="pegawai" required>
            <button type="submit" name="submit">Submit</button>
        </div>
        </div>
    </form>

<?php
if(isset($_POST['submit'])){
    $no_pegawai = $_POST['pegawai'];

    $no_pegawai = strval($no_pegawai);

    if($no_pegawai < 11){
        echo "no pegawai tidak sesuai";
    }
    $no_golongan = substr($no_pegawai,0,1);
    $tanggal = substr($no_pegawai,1,2);
    $bulan = substr($no_pegawai,3,1);
    $tahun = substr($no_pegawai,5,4);
    $no_urutan = substr($no_pegawai,9,2);

    if($bulan == "01"){
        echo $bulan = "januari ";
    } else if($bulan == "02"){
        echo $bulan = "Februari ";
    } else if($bulan == "03"){
        echo $bulan = "Maret ";
    } else if($bulan == "04"){
        echo $bulan = "April ";
    } else if($bulan == "05"){
        echo $bulan = "Mei ";
    } else if($bulan == "06"){
        echo $bulan = "Juni ";
    } else if($bulan == "07"){
        echo $bulan = "Juli ";
    } else if($bulan == "08"){
        echo $bulan = "Agustus ";
    } else if($bulan == "09"){
        echo $bulan = "September ";
    } else if($bulan == "10"){
        echo $bulan = "Oktober ";
    } else if($bulan == "11"){
        echo $bulan = "November ";
    } else {
        echo "Desember ";
    }

    $tanggal_lahir = $tanggal . " " . $bulan . " " . $tahun;
    echo "No Pegawai :" . $no_pegawai . "<br>";
    echo "Nomor Golongan :" . $no_golongan . "<br>";
    echo "Tanggal lahir :" . $tanggal_lahir . "<br>";
    echo "Nomor Urutan :" . $no_urutan . "<br>";
}   

?>
    </div>
</body>
</html>