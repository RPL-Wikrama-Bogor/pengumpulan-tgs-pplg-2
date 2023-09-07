<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .card {
  border: 1px solid #ccc;
  padding: 20px;
  width: 300px;
  margin: 20px;
  baground-color: red;
}

.header {
  font-weight: bold;
  margin-bottom: 10px;
}

.label {
  font-weight: bold;
}

    </style>
</head>
<body>
    
<?php
function getBulanNama($bulan) {
  $bulanArr = array(
    "01" => "JANUARI",
    "02" => "FEBRUARI",
    "03" => "MARET",
    "04" => "APRIL",
    "05" => "MEI",
    "06" => "JUNI",
    "07" => "JULI",
    "08" => "AGUSTUS",
    "09" => "SEPTEMBER",
    "10" => "OKTOBER",
    "11" => "NOVEMBER",
    "12" => "DESEMBER"
  );

  return $bulanArr[$bulan];
 }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $pegawaiCode = $_POST["pegawai_code"];

  $golongan = substr($pegawaiCode, 0, 1);
  $tanggal = substr($pegawaiCode, 1, 2);
  $bulan = substr($pegawaiCode, 3, 2);
  $tahun = substr($pegawaiCode, 5, 4);
  $nomorUrut = substr($pegawaiCode, 9);

  $bulanNama = getBulanNama($bulan);
}
?>

<div class="card">
  <div class="header">Kartu Pegawai</div>
  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    <div class="label">Nomor Golongan:</div>
    <div><?php echo $golongan; ?></div>
    <div class="label">Tanggal Lahir:</div>
    <div><?php echo $tanggal . " " . $bulanNama . " " . $tahun; ?></div>
    <div class="label">Nomor Urut:</div>
    <div><?php echo $nomorUrut; ?></div>
  <?php } ?>
</div>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
  <label for="pegawai_code">Masukkan Kode Pegawai:</label>
  <input type="text" id="pegawai_code" name="pegawai_code">
  <button type="submit">Cetak Kartu</button>
</form>

</body>
</html>
