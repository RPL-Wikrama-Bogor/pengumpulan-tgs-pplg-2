<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jam</title>
<head>

</head>

<body>

//aldo

    <form action="" method="post">
       


        <div style="text-align: center;">
            <h2>Masukkan Inputan</h2>
        </div>



        <div class="input">

            <div class="label">
                <label for="jam"> jam :</label>
            </div>
            <input type="number" name="h" id="jam" required>

        </div>

        <br>

        <div class="input">

            <div class="label">
                <label for="menit"> menit:</label>
            </div>
            <input type="number" name="m" id="menit" required>

        </div>


        <br>

        <div class="input">

            <div class="label">
                <label for="detik"> detik:</label>
            </div>

            <input type="number" name="s" id="detik" required>

        </div>


        <br>

        <div class="submit">

            <label for="submit"></label>
            <input type="submit" name="submit" id="submit">

        </div>

    </form>

    <br>
    <br>


    <?php

    $hh;
    $mm;
    $ss;


    if (isset($_POST['submit'])) {
        $hh = $_POST['h'];
        $mm = $_POST['m'];
        $ss = $_POST['s'];

        $ss = $ss + 1;

        if ($ss >= 60) {
            $mm = $mm + 1;
            $ss = 00;

            if ($mm >= 60) {
                $hh = $hh + 1;
                $mm = 00;
                $ss = 00;

                if ($hh >= 24) {
                    $hh = 00;
                    $mm = 00;
                    $ss = 00;
                }
            }
        } else {
            $ss = $ss;
        }




        echo '<span class="text">' . $hh . ':</span>';
        echo '<span class="text">' . $mm . ':</span>';
        echo '<span class="text">' . $ss . '</span>';
    }


    ?>
</body>

</html>