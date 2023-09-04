<?php
$suhu_fh;
$celcius;
$dingin;
$normal;
$panas;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>suhu</title>
</head>
<body>
<form action="" method="post">
        <div style="display :flex;">
            <label for="suhu_fh">angka suhu fahrenheit : </label>
            <input type="number" id="suhu_fh" name="suhu_fh">    
        </div>
        <button type="submit" name="submit">kirim</button>
</form>
</body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $suhu_fh = $_POST['suhu_fh'];
        $celcius = $suhu_fh - 32 / 1.8;

    if ($celcius > 300) {
        echo "panas";
    }
    else if ($celcius > 250) {
        echo "dingin";
    }
    else {
        echo "normal";
    }
}
?>