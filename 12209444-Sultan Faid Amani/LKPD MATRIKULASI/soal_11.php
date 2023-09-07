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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .forum {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .input {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
        }

        .input_data {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="forum">
        <div class="input">
            <form action="" method="post">
                <div class="input_data">
                    <label for="no_pegawai">No.pegawai (11 Digit): </label>
                    <input type="text" id="no_pegawai" name="no_pegawai">
                </div>
                <button type="submit" name="submit">Kirim</button>
                <br>
                <?php
if (isset($_POST['submit'])) {
    $no_pegawai= $_POST['no_pegawai'];

    if ($no_pegawai<11) {
        echo "No.pegawai tidak sesuai";
    }

    else {
        $no_golongan = substr($no_pegawai, 0 , 1 );
        $tanggal = substr($no_pegawai, 1, 2);
        $bulan = substr($no_pegawai, 3, 2);
        $tahun = substr($no_pegawai, 5, 4);
        $no_urutan = substr($no_pegawai, 9, 2);
    }

    if ($bulan == "01") {
        $bulan = "Januari";
    }

    elseif ($bulan == "02") {
        $bulan = "Febuari";
    }
    elseif ($bulan == "03") {
        $bulan = "Maret";
    }
    elseif ($bulan == "04") {
        $bulan = "April";
    }
    elseif ($bulan == "05") {
        $bulan = "Mei";
    }
    elseif ($bulan == "06") {
        $bulan = "Juni";
    }
    elseif ($bulan == "07") {
        $bulan = "Juli";
    }
    elseif ($bulan == "08") {
        $bulan = "Agustus";
    }
    elseif ($bulan == "09") {
        $bulan = "September";
    }
    elseif ($bulan == "10") {
        $bulan = "Oktober";
    }
    elseif ($bulan == "11") {
        $bulan = "November";
    }
    else {
        $bulan = "Desember";
    }

    $tanggal_lahir = $tanggal . $bulan . $tahun;
    
    echo "Nomor golongan: " . $no_golongan;
    echo "<br>";
    echo "Tanggal lahir: " . $tanggal_lahir;
    echo "<br>";
    echo "Nomor urutan: " . $no_urutan;

}

?>

            </form>
        </div>
    </div>
</body>
</html>


