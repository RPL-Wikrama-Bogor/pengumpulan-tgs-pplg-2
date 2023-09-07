<?php 
    $hh;
    $mm;
    $ss;

    if(isset($_POST["submit"])){
        $hh = $_POST["hh"];
        $mm = $_POST["mm"];
        $ss = $_POST["ss"];

        $ss = $ss + 1;

        if($ss >= 60){
            $mm = $mm + 1;
            $ss = "00";
            if($mm >= 60){
                $hh = $hh + 1;
                $mm = "00";
                if($hh >= 24){
                    $hh = "00";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambah Waktu</title>
    <style>
        body{
            background-image: url(bgsoal12.jpg);
            background-size: cover;
            font-family: Arial, Helvetica, sans-serif;
        }
        form{
            background-color: #DAF5FF;
            text-align: center;
            color: #793FDF;           
            font-size: 20px;
            width: 500px;
            height: 360px;
            float: right;
            margin-right: 10rem;
            margin-top: 8rem;
            padding: 20px;
            border-radius: 20px;
            font-weight: 600;
            box-shadow: 0px 0px 50px #30A2FF;
        }
        div{
            margin-bottom: 1rem;
        }
        input[type]{
            border-radius: 10px;
            border: 1;
            border-color: lightgray;
            height: 25px;
        }
        h2{
            padding-top: 1.5rem;
            padding-bottom: -10px;
            margin-top: -20px;
            margin-left: -20px;
            color: white;
            width: 540px;
            border-radius: 20px 20px 0px 0px;
            height: 60px;
            background: -webkit-linear-gradient(right, #279EFF, #7091F5, #793FDF);
        }
        button{
            color: white;
            background: -webkit-linear-gradient(right, #279EFF, #7091F5, #793FDF);
            width: 100px;
            height: 40px;
            font-size: 15px;
            border-radius: 10px;
            border: 0;
        }
        @media (max-width:740px) {
            form{
                margin-right: 1rem;
            }
        }
        @media (max-width:600px) {
            form{
                width: 380px;
            }
            h2{
                width: 420px;
            }
        }
    </style>
</head>
<body>
    <center>

        <form action="" method="post">
            <h2>Menambah Waktu</h2>
                <label for="hh">Input Jam : </label>
                <input type="number" name="hh" id="hh" required><br><br>
                <label for="mm">Input Menit : </label>
                <input type="number" name="mm" id="mm" required><br><br>   
                <label for="ss">Input Detik : </label>
                <input type="number" name="ss" id="ss" required ><br><br> 
                <button type="submit" name="submit"><b>+1 Detik</b></button>
            <?php 
                if(isset($_POST["submit"])){
                    echo "<p>Waktu ditambah 1 detik: <br>" . sprintf("%02d", $hh) . " : " . sprintf("%02d", $mm) . " : " . sprintf("%02d", $ss) . "</p>";
                }
            ?>
        </form>
    </center>

</body>
</html>
