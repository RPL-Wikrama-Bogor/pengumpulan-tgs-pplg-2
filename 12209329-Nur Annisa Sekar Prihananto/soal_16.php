<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bilangan Ganjil dan Genap</title>
</head>
<style>body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    text-align: center;
}

h1 {
    color: #333;
}

ul {
    list-style: none;
    padding: 0;
}

li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

li.ganjil {
    background-color: #E4E4D0; 
    color: #333;
    font-weight: bold;
}

li.genap {
    background-color: #AEC3AE; 
    color: #fff;
    font-weight: bold;
}
 </style>
<body>
    <div class="container">
        <h1>Bilangan Ganjil dan Genap</h1>
        <ul>
            <?php
            for ($i = 1; $i <= 50; $i++) {
                if ($i % 2 == 0) {
                    echo '<li class="genap">' . $i . ' = bilangan genap</li>';
                } else {
                    echo '<li class="ganjil">' . $i . ' = bilangan ganjil</li>';
                }
            }
            ?>
        </ul>
    </div>
</body>
</html>
