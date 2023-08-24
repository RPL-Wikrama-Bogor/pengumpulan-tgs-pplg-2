<?php

    $no_pegawai = "";
    $cek;
    $no_golongan = "";
    $tanggal = "";
    $bulan = "";
    $tahun = "";
    $no_urutan = "";
    $tanggal_lahir = "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 11</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>

        div{
            align-items: center;
        }

    </style>
</head>
<body>

<div class="card">
  <div class="card-body">


    <form action="" method="post">
        <div class="input-group flex-nowrap" style="width : 500px;">
    <label class="input-group-text" id="addon-wrapping" for="no">Masukan No Pegawai : </label>
    <input type="number" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" name="no" id="no">
    </div>
    <button type="button" class="btn btn-primary" name="submit">Submit</button>
    </form>
    </div>
    </div>
    
    
    <?php

    if(isset($_POST['submit'])){

        $no_pegawai = $_POST['no'];
        $no_pegawai = strval($no_pegawai);
        if($no_pegawai < 11){
            echo "No Pegawai Tidak Sesuai!!";
        }else{
            $no_golongan = substr($no_pegawai, 0,1);
            $tanggal = substr($no_pegawai, 1,2);
            $bulan = substr($no_pegawai, 3,2);
            $tahun = substr($no_pegawai, 5,4);    
            $no_urutan = substr($no_pegawai, 9,2);    
        

        if($bulan == "01"){
            $bulan = "Januari";
        }

        else if($bulan == "02"){
            $bulan = "Februari";
        }

        else if($bulan == "03"){
            $bulan = "Maret";
        }

        else if($bulan == "04"){
            $bulan = "April";
        }

        else if($bulan == "05"){
            $bulan = "Mei";
        }

        else if($bulan == "06"){
            $bulan = "Juni";
        }

        else if($bulan == "07"){
            $bulan = "Juli";
        }

        else if($bulan == "08"){
            $bulan = "Agustus";
        }

        else if($bulan == "09"){
            $bulan = "September";
        }

        else if($bulan == "10"){
            $bulan = "Oktober";
        }

        else if($bulan == "11"){
            $bulan = "November";
        }

        else{
            $bulan = "Desember";
        }
    
        $tanggal_lahir = $tanggal . " " . $bulan . " " . $tahun;
        echo "No Golongan : ".$no_golongan."<br>Tanggal Lahir : ".$tanggal_lahir."<br>No Urutan : ".$no_urutan;
        }
}

    ?>
</body>
</html>