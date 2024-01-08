
<?php
include 'proses.php';
$proses = new SewaRuangan();
$proses->setHarga(400000, 600000, 850000);
if (isset($_POST['kirim'])) {
    $proses->jamSewa = $_POST['jam'];
    $proses->jenis = $_POST['jenis'];

    $proses->biayaSewa();
    $proses->cetakSewaRuangan();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sewa Ruangan</title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    background-image:url("https://d1csarkz8obe9u.cloudfront.net/posterpreviews/conference-room-zoom-background-templates-design-2aa32492074fc3ea8516ba00498826d5_screen.jpg?ts=1589099151");
    }

    center {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    }

    table {
    background-color: #fff;
    border: 2px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 20px;
    }

    table tr {
    margin: 10px;
    }

    table tr td {
    padding: 10px;
    }

    table select, table input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    }

    table input[type="submit"] {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    }

    table input[type="submit"]:hover {
    background-color: #2980b9;
    }

    .output-box {
    background-color: #fff;
    border: 2px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    padding: 10px;
    text-align: center;
    width: 20%;
    height: 60vh; 
    margin: 20vh auto; 
    display: flex;
    justify-content: center;
    align-items: center;
    }




 </style>
</head>
<body>
    <center>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Masukkan Jumlah Jam Sewa :</td>
                    <td>
                        <input type="number" name="jam" required>
                    </td>
                </tr>
                <tr>
                    <td>Pilih Jenis Ruangan :</td>
                    <td>
                        <select name="jenis" required>
                            <option value="reguler">Reguler</option>
                            <option value="vip">VIP</option>
                            <option value="vvip">VVIP</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Sewa" name="kirim"></td>
                </tr>
            </form>
        </table>
    </center>
</body>
</html>

