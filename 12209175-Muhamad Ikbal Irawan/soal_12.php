<?php

    $hh;
    $mm;
    $ss;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 12</title>
</head>
<body>
    <h1>Data Waktu Setelah Ditambahkan 1 detik</h1>

    <form action="" method="post">
            <div style="display: flex;">
                <label for="h">Input Hours : </label>
                <input type="number" name="h" id="h">
            </div>
            <div style="display: flex;">
                <label for="m">Input Minute : </label>
                <input type="number" name="m" id="m">
            </div>
            <div style="display: flex;">
                <label for="s">Input Second : </label>
                <input type="number" name="s" id="s">
            </div>
            <button type="submit" name="submit">Kirim!</button>
        </form>

        <?php

            if (isset($_POST['submit'])) {
                $hh = $_POST['h'];
                $mm = $_POST['m'];
                $ss = $_POST['s'];

                $ss += 1;

                if($ss >= 60){
                    $mm += 1;
                    $ss = 00;
                }

                if($mm >= 60){
                    $hh += 1;
                    $mm = 00;
                    $ss = 00;
                }

                if($hh >= 24){
                    $hh = 00;
                    $mm = 00;
                    $ss = 00;
                }

                echo $hh.":".$mm.":".$ss;


            }

        ?>
    
</body>
</html>