<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
</head>
<body>
    <center>
    <h1>Rental Motor</h1>
    <form method="post" action="">
        Nama: <input type="text" name="nama"><br>
        Waktu Hari Peminjaman: <input type="number" name="waktuPinjam"><br>
        Jenis Motor: 
        <select name="tipeMotor">
            <option value="vario">Vario</option>
            <option value="mio">mio</option>
            <option value="scoopy">scoppy</option>
        </select><br>
        <input type="submit" name="submit">
    </form><br>
    
        <?php 
            require 'controller.php';
            if ( isset($_POST["submit"])) {
                $nama = strtolower($_POST["nama"]);
                $waktuPinjam = $_POST["waktuPinjam"];
                $tipeMotor = $_POST["tipeMotor"];
            
                $calculator = new RentalMotor();
                $calculator->setBiaya($nama, $waktuPinjam, $tipeMotor);
            }
        ?>
    
    </center>
</body>
</html>