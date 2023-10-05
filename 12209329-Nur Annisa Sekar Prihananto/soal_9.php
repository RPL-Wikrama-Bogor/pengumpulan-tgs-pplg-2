<?php
$suhu_f;
$suhu_c;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Suhu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .result {
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Konversi Suhu</h2>
        <form method="post" action="">
            <div>
                <label for="fahrenheit">Input Suhu Fahrenheit :</label>
                <input type="text" name="fahrenheit" id="fahrenheit">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    <?php
    if (isset($_POST['submit'])) {
    $suhu_f = $_POST['fahrenheit'];

    $suhu_c = ($suhu_f - 32)*5/9;

    if($suhu_c > 30){
      echo "suhu panas";
    }
    elseif($suhu_c > 25){
      echo "suhu dingin";
    }
    else{
      echo "suhu normal";
    }
  }

  ?>
</body>
</html>