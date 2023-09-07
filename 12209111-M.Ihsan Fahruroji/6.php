<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konversi waktu</title>
</head>
<body>
 <form action="" method="post">
    <div style="display: flex;">
        <label for="waktu">masukan waktu awal (detik) : </label>
        <input type="number" id="waktu" name="waktu">
    </div>
    <button type="submit" name="submit">kirim</button>
</form>
</body>
</html>

<?php 
$waktu;
$jam;
$menit;
$detik;
$hasil = ""; // Menggunakan tanda kutip ganda di sini untuk inisialisasi string.

if(isset($_POST['submit'])){ // Menggunakan $_POST dengan huruf besar.
    $waktu = $_POST['waktu']; // Menggunakan $_POST dengan huruf besar.

    if($waktu >= 3600){
        $jam = floor($waktu/3600);
        $waktu -= ($jam*3600);
        $hasil .= $jam . " jam "; // Menambahkan spasi setelah "jam".
    } else {
        $hasil .= "0 jam "; // Menambahkan "0 jam" jika waktu kurang dari 3600 detik.
    }
    
    if ($waktu >= 60 ){
        $menit = floor($waktu/60);
        $waktu -= ($menit*60);
        $hasil .= $menit . " menit "; // Menambahkan spasi setelah "menit".
    } else {
        $hasil .= "0 menit "; // Menambahkan "0 menit" jika waktu kurang dari 60 detik.
    }
    
    $detik = $waktu;
    $hasil .= $detik . " detik"; // Menambahkan spasi setelah "detik".
    echo $hasil;
}
?>
