<?php
    // Preparation
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
    <title>Soal-11</title>
    <style>
        body{
            margin-bottom: 33%;
            background-image: linear-gradient(45deg, orange, yellow);
        }
        .content{
            border-radius: 50px;
            justify-content: center;
            border-style: double;
            margin: 0px 25% 0px;
            padding: 10px 0px 20px 0px;
        }
    </style>
</head>
<body>
    <!-- Siapkan Input -->
                <h1><center>No pegawai</center></h1>
                <form action="" method="post" >
                <div class="content">
                    <div style="display: flex; justify-content: center;">
                        <label for="no_pegawai">Masukan No Pegawai </label>
                        <input type="number" name="no_pegawai" id="no_pegawai">
                        <button type="submit" name="submit" id="button-addon2" style= "justify-content: center;">Kirim!
                    </button>                    
                    </div>

                </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
    // Cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        $no_pegawai = $_POST['no_pegawai'];

            $no_pegawai = strval($no_pegawai);

        if ($no_pegawai < 11) {
            echo "No Pegawai Tidak Sesuai";
        } else {
            $no_golongan = substr($no_pegawai, 0, 1);
            $tanggal = substr($no_pegawai, 1, 2);
            $bulan = substr($no_pegawai, 3, 1);
            $tahun = substr($no_pegawai, 5, 4);
            $no_urutan = substr($no_pegawai, 9, 2);

            if($bulan == "01") {
                $bulan = "Januari";
            } else if($bulan == "02") {
                $bulan = "Februari";
            } else if($bulan == "03") {
                $bulan = "Maret";
            } else if($bulan == "04") {
                $bulan = "April";
            } else if($bulan == "05") {
                $bulan = "Mei";
            } else if($bulan == "06") {
                $bulan = "Juni";
            } else if($bulan == "07") {
                $bulan = "Juli";
            } else if($bulan == "08") {
                $bulan = "Agustus";
            } else if($bulan == "09") {
                $bulan = "September";
            } else if($bulan == "10") {
                $bulan = "Oktober";
            } else if($bulan == "11") {
                $bulan = "November";
            } else {
                $bulan = "Desember";
            } 

            $tanggal_lahir = $tanggal . " " . $bulan . " " . $tahun;
            echo "<center>Kode Pegawai : " . $no_pegawai . "<br>No Golongan : " . $no_golongan . "<br>Tanggal Lahir : " . $tanggal_lahir . "<br>No Urutan : " . $no_urutan . "</center>";
        }
         
    }
?>