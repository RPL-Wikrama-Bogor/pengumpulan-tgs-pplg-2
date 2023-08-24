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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Soal-11</title>
</head>
<body>
    <!-- Siapkan Input -->
    <div class="container my-5">
        <div class="card" >
            <div class="card-body border border-primary">
                <h1 class="text-center mt-1 text-primary">Kode Pegawai</h1>
                <form action="" method="post">
                    <div class="input-group mt-3 mb-4">
                        <input type="number" name="no_pegawai" class="form-control" placeholder="Masukkan No Pegawai (Wajib 11 Angka!)" aria-label="Masukkan No Pegawai (Wajib 11 Angka!)" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" name="submit" id="button-addon2">Kirim!</button>
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