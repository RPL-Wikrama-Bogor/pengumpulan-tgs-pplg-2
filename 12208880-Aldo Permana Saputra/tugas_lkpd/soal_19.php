<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
//aldo
<h4>Pesan tiket : </h4>

    <form action="" method="post">
        <div>
            <div>
                <label for="vip"> Tiket vip </label>
                <input type="text" name="vip" id="vip" maxlength="50" oninput="validateInput()" required>
                <p id="errorMessage" style="color: red;" ></p>
            </div>

            <div>
                <label for="eksekutif"> Tiket eksekutif </label>
                <input type="text" name="eksekutif" id="eksekutif" required>
            </div>
            <br>

            <div>
                <label for="ekonomi"> Tiket ekonomi </label>
                <input type="text" name="ekonomi" id="ekonomi" required>
            </div>
            <br>


            <div>
                <label for="submit"></label>
                <input type="submit" name="submit" id="submit">
            </div>


        </div>
    </form>



</body>



</html>




<?php


    $keun_vip = 0;
    $keun_eksekutif = 0;
    $keun_ekonomi = 0;

    $vip;
    $eksekutif;
    $ekonomi;

    $keun_keseluruhan;
    $total_tiket;



    if (isset($_POST['submit'])) {
        $vip = $_POST['vip'];
        $eksekutif = $_POST['eksekutif'];
        $ekonomi = $_POST['ekonomi'];


        if ($vip >= 35 ) {
            $keun_vip = ($vip * 50000) * 25 /100;

        }elseif ($vip < 35 && $vip >= 20) {
            $keun_vip = ($vip * 50000) * 15 / 100; 
        }else {
            $keun_vip = ($vip * 50000) * 5/ 100;
        }

        
        if ($eksekutif >= 40 ) {
            $keun_eksekutif = ($eksekutif * 30000) * 20 /100;

        }elseif ($eksekutif < 40 && $eksekutif >= 20) {
            $keun_eksekutif = ($eksekutif * 30000) * 10 / 100; 
        }else {
            $keun_eksekutif = ($eksekutif * 30000) * 2/ 100;
        }

        
        if ($ekonomi > 0 && $ekonomi <= 50) {
            $keun_ekonomi = ($ekonomi * 20000) * 7 /100;
        }


        $keun_keseluruhan = $keun_vip + $keun_eksekutif + $keun_ekonomi;
        $total_tiket = $vip + $eksekutif + $ekonomi;


        echo "Keuntungan tiket per kelas : ";
        echo "</br>";

        echo "VIP = Rp." . number_format($keun_vip);

        echo "</br>";
        
        echo "Eksekutif = Rp." . number_format($keun_eksekutif);
        
        echo "</br>";

        echo "Ekonomi = Rp." . number_format( $keun_ekonomi);

        echo "</br>";
        echo "<=============================>";
        echo "</br>";

        echo "Keuntungan secara keseluruhan = Rp." . number_format($keun_keseluruhan);

        echo "</br>";
        echo "<=============================>";
        echo "</br>";

        echo "Jumlah tiket per kelas : ";
        echo "</br>";

        echo "VIP = " . $vip;
        echo "</br>";
        echo "Eksekutif = " . $eksekutif;
        echo "</br>";
        echo "Ekonomi = " . $ekonomi;

        echo "</br>";
        echo "<=============================>";
        echo "</br>";


        echo "Total tiket dari seluruh kelas : " . number_format( $total_tiket);



        


    }


?>
