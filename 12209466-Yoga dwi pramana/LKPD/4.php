<?php
    $nama;
    $tunjangan;
    $pajak;
    $gaji_bersih;
    $gaji_pokok;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menentukan Gaji Karyawan</title>
</head>
<body>

      <h1>Hitung gaji</h1>
      <!-- kenapa pakai post?  metode pengiriman data yang Datanya tidak disimpan pada URL. -->
     <form action="" method="post">
      <div class="display: flex;" >
        <label for="nama">Masukkan Nama</label>
        <br>
        <input type="text" name="nama" id="nama">
        <br>
      </div>
      <div class="display: flex;" >
        <label for="gaji_pokok">Masukkan Gaji Pokok</label>
        <br>
        <input type="text" name="gaji_pokok" id="gaji_pokok">
        <br>
      </div>
      <br>
      <button type="submit" name="submit">Kirim</button>
     </form>
    
     
     
     <?php
    //  mengapa post? berfungsi untuk memanggil data yang telah diinputkan agar bisa ditampilkan di file action.
    if(isset($_POST['submit'])) {
      $nama = $_POST['nama'];
      $gaji_pokok = ($_POST['gaji_pokok']);

      // hitung tunjangan
      $tunjangan = 0.2 * $gaji_pokok;

      // hitung pajak
      $pajak = 0.15 * ($gaji_pokok + $tunjangan);

      // hitung total
      $gaji_bersih = $gaji_pokok + $tunjangan - $pajak;

      echo "<hr> <h2>Hasil</h2> </hr>";
      echo " <br> ";
      echo " Nama karyawan : " . $nama ."<br>";
      echo " tunjangan : Rp. " . $tunjangan ."<br>";
      echo " pajak : Rp." . $pajak ."<br>";
      echo " gaji : bersih: Rp. "  . $gaji_bersih ;
    }
    ?>
    </body>
    </html>