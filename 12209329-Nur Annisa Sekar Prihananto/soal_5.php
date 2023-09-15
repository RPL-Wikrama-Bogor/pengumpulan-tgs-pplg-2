<?php
//preparation
$jam;
$menit;
$detik;
$total;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Konversi Jam-Menit-Detik ke Total Detik</title>
</head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-image:url(https://cdn.pixabay.com/photo/2022/03/02/09/17/wallpaper-7042708_960_720.jpg);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            float: left;
            margin: 2rem;

        }
       .form {
            background-color: #B7B7B7;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(5, 5, 0, 0.1);
            padding: 20px;
            width: 500px;
        }
        input {
            width: 95%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #FFBFBF;
            color: brown;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            cursor: pointer;
            color: black;
        }
        button:hover {
            background-color: #F4EEEE;
            transition: 0.3s;
        }
        .echo {
            margin-top: 50px;
            padding: 10px;
            background-color: #f4f4f4;
            border-radius: 4px;
            align-items: center;
            padding: 20px;
        }
        .container{
            background-color: #B7B7B7;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 500px;
            margin: 215px;
            height: 300px;
        }
    </style>
<body>
    <form method="post" action="">
    <div class="form">
        <label>Jam:</label>
        <input type="number" name="jam" required><br><br>

        <label>Menit:</label>
        <input type="number" name="menit" required><br><br>

        <label>Detik:</label>
        <input type="number" name="detik" required><br><br> <!--required berfungsi memastikan agar kolom input tidak kosong-->

        <input type="submit" name="submit" value="Hitung">
    </div>  
    </form>
    <div class="container">
    <?php
    //cek apakah button dgn name submit di klik
    if (isset($_POST['submit'])) {
        //pengisian form input
        $jam = $_POST['jam'];
        $menit = $_POST['menit'];
        $detik = $_POST['detik'];

        // Menghitung total detik
        $total = ($jam * 3600) + ($menit * 60) + $detik;

        // Menampilkan output
        echo "<br>Total Detik: " . $total . "<br>";
    }
    ?>
    </div>
</body>
</html>