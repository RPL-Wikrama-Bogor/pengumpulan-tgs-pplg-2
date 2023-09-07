<?php
    // Preparation
    $hh;
    $mm;
    $ss;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Soal-12</title>
</head>
<body>
    <!-- Siapkan Input -->
    <div class="container my-5">
        <div class="card" >
            <div class="card-body border border-primary">
                <h1 class="text-center">Data waktu setelah ditambahkan 1 detik</h1>
                <form action="" method="post">
                    <div class="input-group mt-3 mb-4">
                        <input type="number" name="hh" class="form-control" placeholder="Masukkan Jam" aria-label="Masukkan Jam" aria-describedby="button-addon2">
                    </div>
                    <div class="input-group mt-3 mb-4">
                        <input type="number" name="mm" class="form-control" placeholder="Masukkan Menit" aria-label="Masukkan Menit" aria-describedby="button-addon2">
                    </div>
                    <div class="input-group mt-3 mb-4">
                        <input type="number" name="ss" class="form-control" placeholder="Masukkan Detik" aria-label="Masukkan Detik" aria-describedby="button-addon2">
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit" id="button-addon2">Kirim!</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php
    // Cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        $hh_old = $_POST['hh'];
        $mm_old = $_POST['mm'];
        $ss_old = $_POST['ss'];

        $hh = $_POST['hh'];
        $mm = $_POST['mm'];
        $ss = $_POST['ss'];
        
        $ss = $ss + 1;

        if ($ss >= 60) {
            $mm = $mm + 1;
            $ss = 00; 
        } 

        if ($mm >= 60){
            $hh = $hh + 1;
            $mm = 00;
            $ss = 00;
        }

        if ($hh >= 24) {
            $hh = 00;
            $mm = 00;
            $ss = 00;
        } 
           echo "<center>Sebelum Ditambahkan 1 Detik : " . $hh_old . " : " . $mm_old . " : " . $ss_old ;
           echo "<br>Setelah Ditambahkan 1 Detik : " . $hh . " : " . $mm . " : " . $ss . "</center>";
    }
?>