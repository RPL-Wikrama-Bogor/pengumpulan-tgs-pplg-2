<!DOCTYPE html>
<html>
<head>
    <title>Form Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("https://png.pngtree.com/background/20220729/original/pngtree-simple-background-best-to-use-for-aesthetic-picture-image_1858050.jpg");
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;

        }
        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 10px 10px 1000px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
            border-radius: 25% 10%;
        }
        h2 {
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
        }
        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #D8D9DA;
            color: brown;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            color: black;
            
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 4px;
        }
        h1{
            font-size: 100px;
            float: left;
        }
    
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Pegawai</h2>
        <form action="" method="post">
            <br>
            <label for="pegawai_number">Masukkan nomor pegawai (11 digit):</label>
            <input type="text" id="pegawai_number" name="pegawai_number" maxlength="11" required>
            <button type="submit">Tampilkan Informasi</button>
        </form>
        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $pegawaiNumber = $_POST["pegawai_number"];

                if (strlen($pegawaiNumber) == 11) {
                    $golongan = $pegawaiNumber[0];
                    $tanggal = substr($pegawaiNumber, 1, 2);
                    $bulan = substr($pegawaiNumber, 3, 2);
                    $tahun = substr($pegawaiNumber, 5, 4);
                    $nomorUrut = substr($pegawaiNumber, 9, 2);

                    
                    $bulanArray = ["", "JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"];
                     
                    $namaBulan = $bulanArray[(int)$bulan];

                    echo "<h2>Hasil:</h2>";
                    echo "Nomor Golongan: $golongan <br>";
                    echo "Tanggal Lahir: $tanggal $namaBulan $tahun <br>";
                    echo "Nomor Urut: $nomorUrut <br>";
                    echo "Bulan Kelahiran: $namaBulan";
                } else {
                    echo "Maaf, nomor pegawai harus terdiri dari 11 digit.";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>