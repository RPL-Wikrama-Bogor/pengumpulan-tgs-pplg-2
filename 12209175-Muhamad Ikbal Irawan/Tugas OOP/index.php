<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Motor</title>
    <style>
        div{
            border: 1px solid black;
            padding: 10px;
            width: 400px;
        }
    </style>
</head>
<body>
    <center>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Nama Pelanggan : </td>
                    <td>
                        <input type="text" name="nama" required>
                    </td>
                </tr>
                <tr>
                    <td>Lama Waktu Rental (per hari) :</td>
                    <td>
                        <input type="number" name="hari" required>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Motor :</td>
                    <td>
                        <select name="jenis" required>
                            <option value="" hidden selected> --> Pilih Motor <-- </option>
                            <option value="hondaAdv">Honda ADV 160</option>
                            <option value="hondaBeat">Honda Beat</option>
                            <option value="hondaPcx">Honda PCX</option>
                            <option value="hondaVario">Honda Vario 125</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 53.5%;"><input type="submit" value="Rental" name="kirim"></td>
                </tr>
            </form>
        </table>
    </center>
</body>
</html>

<?php
include 'control.php';
$control = new Rental();
$control->setHarga(70000, 75000, 80000, 100000);
if (isset($_POST['kirim'])) {
    $control->nama = $_POST['nama'];
    $control->waktu = $_POST['hari'];
    $control->jenis = $_POST['jenis'];

    $control->hitungharga();
    $control->perentalan();
}
?>