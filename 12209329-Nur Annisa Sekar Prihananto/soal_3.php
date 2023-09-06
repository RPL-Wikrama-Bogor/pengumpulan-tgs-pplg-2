<?php
//preparation
$bilangan_satu;
$bilangan_dua;
$bilangan_tiga;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 15px;
}

label {
    font-weight: bold;
}

input[type="number"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

.result {
    font-weight: bold;
    margin-top: 15px;
}
</style>
<body>
    <form action="" method="post">
        <div class="form-group">
        <div style="display: flex;">
            <label for="angka_satu">Masukan Angka Pertama</label>
            <input type="number" name="angka_satu" id="angka_satu">
        </div>
        <div class="form-group">
        <div style="display: flex;">
            <label for="angka_dua">Masukan Angka Kedua</label>
            <input type="number" name="angka_dua" id="angka_dua">
        </div>
        <div class="form-group">
        <div style="display: flex;">
            <label for="angka_tiga">Masukan Angka Ketiga</label>
            <input type="number" name="angka_tiga" id="angka_tiga">
        </div>
        <button type="submit" name="submit">Kirim</button>
    </form>
    <div class="result">
    <?php
//cek apakah button 
if(isset($_POST['submit'])){
    //pengisian input ke variable
    $bilangan_satu = $_POST['angka_satu'];
    $bilangan_dua = $_POST['angka_dua'];
    $bilangan_tiga = $_POST['angka_tiga'];
//decision
// . namanya concat = menghubungkan string dan variable
if($bilangan_satu >= $bilangan_dua && $bilangan_satu > $bilangan_tiga){
    echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . "|| Yang terbesar : <b>" . $bilangan_satu . " </b>";
}
else if($bilangan_dua >= $bilangan_satu && $bilangan_dua > $bilangan_tiga){
    echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . "|| Yang terbesar : <b>" . $bilangan_dua . " </b>";
}
else if($bilangan_tiga >= $bilangan_dua && $bilangan_tiga > $bilangan_satu){
    echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . "|| Yang terbesar : <b>" . $bilangan_tiga . " </b>";
}
else{
    echo "Bilangan Pertama : " . $bilangan_satu . "|| Bilangan Kedua : " . $bilangan_dua . " || Bilangan ketiga : " . $bilangan_tiga . "|| BILANGAN SAMA BESAR <b>" ." </b>";
}
}
?>
</body>
</html>

