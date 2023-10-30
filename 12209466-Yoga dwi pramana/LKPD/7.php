<!-- deklarasi -->
<?php
$total_gram;
$harga_sebelum;
$diskon;
$harga_setelah;
?>

<!-- input -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diskon</title>
</head>
<body>
<form action="" method="post">
      <div class="display: flex;" >
        <label for="gram">Massukkan Berat jeruk yang di beli ( 1=100 gram )</label>
        <br>
        <input type="number" name="gram" id="gram">
        <br>
      </div>
      <br>
      <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>

<!-- Proses -->
<?php
     if(isset($_POST['submit'])) {
        $total_gram = $_POST['gram'];
        $harga_sebelum = 5 * $total_gram;
        $diskon = 5 * $harga_sebelum / 100;
        $harga_setelah = $harga_sebelum - $diskon;

        echo " Total yang di beli : " . $total_gram;
        echo " <br> ";
        echo " Harga sebelum : Rp. " . $harga_sebelum;
        echo " <br> ";
        echo " Diskon : Rp. " . $diskon;
        echo " <br> ";
        echo " harga setelah : Rp. " . $harga_setelah;
     }
?>