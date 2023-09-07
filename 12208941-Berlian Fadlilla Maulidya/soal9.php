<?php

$suhu_fahrenheit;
$suhu_celcius;

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suhu</title>
</head>
<body>
  <form method="post" action="#">
    <tr>
      <label for="suhu">Input Suhu</label>
      <input type="text" name="suhu" id="suhu">
      <input type="submit" value="Submit" name="submit">
    </tr>
  </form>

  <?php

  if (isset($_POST['submit'])) {
    $suhu = $_POST['suhu'];
    $suhuf;

    $suhuf = $suhu / 33.8;

    if($suhu > 300){
      echo "panas";
    }
    elseif($suhu > 250){
      echo "dingin";
    }
    else{
      echo "normal";
    }
  }

  ?>
</body>
</html>