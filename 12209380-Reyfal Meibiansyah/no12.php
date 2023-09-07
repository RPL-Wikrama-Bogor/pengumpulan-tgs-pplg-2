<?php
$jam1 = 2;
$men1 = 13;
$det1 = 23;
$jam2 = 2;
$men2 = 13;
$det2 = 59;
$jam3 = 1;
$men3 = 59;
$det3 = 59;
$jam4 = 23;
$men4 = 59;
$det4 = 59;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penambahan detik</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="form-container">
    <div class="header">
        <h1><span class="blue-letter">H</span>itung <span class="blue-letter">W</span>aktu</h1>
    </div>
        <h4>Jam Sebelum Penambahan</h4>
        <h5><?= sprintf("%02d", $jam1) .":". $men1 . ":" . $det1; ?></h5>
        <h5><?= sprintf("%02d", $jam2).":".$men2.":".$det2; ?></h5>
        <h5><?= sprintf("%02d", $jam3).":".$men3.":".$det3; ?></h5>
        <h5><?= "$jam4:$men4:$det4"; ?></h5>
        <br>

        <form action="" method="post">
            <h4>Tambahan Detik</h4>
            <input type="number" name="det"><br>
            <div class="form-group">
                <input type="submit" name="submit" value="Cetak Informasi" class="btn btn-primary">
            </div>
        </form>

<?php
if (isset($_POST["submit"])) {
    if (empty($_POST["det"])) {
        exit("<p class='error'>Masukan input terlebih dahulu</p>");
    } else {
    $d = $_POST["det"];

    $det1 += $d;
    $det2 += $d;
    $det3 += $d;
    $det4 += $d;

    $men1 += intdiv($det1, 60);
    $men2 += intdiv($det2, 60);
    $men3 += intdiv($det3, 60);
    $men4 += intdiv($det4, 60);

    $det1 %= 60;
    $det2 %= 60;
    $det3 %= 60;
    $det4 %= 60;

    $jam1 += intdiv($men1, 60);
    $jam2 += intdiv($men2, 60);
    $jam3 += intdiv($men3, 60);
    $jam4 += intdiv($men4, 60);

    $men1 %= 60;
    $men2 %= 60;
    $men3 %= 60;
    $men4 %= 60;

    $jam1 %= 24;
    $jam2 %= 24;
    $jam3 %= 24;
    $jam4 %= 24;
    }
?>
    <div class="sudh">
    <br>
    <h4>Jam sesudah ditambah <?= $d?> detik</h4>
    <h5><?= sprintf("%02d", $jam1) . ":" . sprintf("%02d", $men1) . ":" . sprintf("%02d", $det1) ?></h5>
    <h5><?= sprintf("%02d", $jam2) . ":" . sprintf("%02d", $men2) . ":" . sprintf("%02d", $det2) ?></h5>
    <h5><?= sprintf("%02d", $jam3) . ":" . sprintf("%02d", $men3) . ":" . sprintf("%02d", $det3) ?></h5>
    <h5><?= sprintf("%02d", $jam4) . ":" . sprintf("%02d", $men4) . ":" . sprintf("%02d", $det4) ?></h5>
    </div>
<?php } ?>
</div>
</body>

</html>