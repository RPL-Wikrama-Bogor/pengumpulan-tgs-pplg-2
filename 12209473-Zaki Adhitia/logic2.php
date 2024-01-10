<?php 
    class DataRentalMotor {
        public $namaPeminjam,
                $lamaRental,
                $jenisYangDipilih;
#hanya dapat di akses lewat class/object yang sama 
        private $motorVario,
                $motorBeat,
                $motorKLX, 
                $motorAerox;
#dapat mengakses hingga kelas turunan       
        protected $listMember = ['agus', 'andi', 'sugi', 'sukria'],
                $diskon = 0,
                $pajak,
                $totalHarga;
                
        function __construct() {
            $this->pajak = 10000;
        }

        public function setHarga ($Vario, $Beat, $KLX, $Aerox) {
            $this->motorVario = $Vario;
            $this->motorBeat = $Beat;
            $this->motorKLX = $KLX;
            $this->motorAerox = $Aerox;
        }

        public function getHarga() {
            $semuaDataMotor["Vario 160"] = $this->motorVario;
            $semuaDataMotor["Beat Street"] = $this->motorBeat;
            $semuaDataMotor["KLX 150L"] = $this->motorKLX;
            $semuaDataMotor["Aerox 155"] = $this->motorAerox;


            return $semuaDataMotor;
        }
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <style>
    body{
        font-family: 'Poppins', sans-serif;
    }

    .cetakbukti{
        border-radius: 2px;
        text-align:initial;
        margin-top: 30px;
        border: 2px solid black;
        width: 500px;
        margin-left: 400px;
        height: 200px;
        padding: 50px;
        background:#F5F5F5;
    }
</style>
    <?php
    
    class Pembelian extends DataRentalMotor {
        public function hargaRental () {
            $dataHarga = $this->getHarga();
            $hargaTotal = $this->lamaRental * $dataHarga[$this->jenisYangDipilih];
           
            if (in_array($this->namaPeminjam,$this->listMember)) {
                $tampil = $this->namaPeminjam . " Berstatus Sebagai Member Mendapatkan Diskon 5%";
                $hargaRental = $hargaTotal - ($hargaTotal * 0.05) + $this->pajak;
            } else {
                $tampil = $this->namaPeminjam . " Bukan Member";
                $hargaRental = $hargaTotal + $this->pajak;

            }
            return [
                "hargaTotal" => $hargaTotal,
                "hargaRental" => $hargaRental,
                "tampil" => $tampil,
            ];
        }

        public function cetakBukti() {
            echo "<div class= cetakbukti>";
            echo "<div>Pesanan Diterima ✔ <br><br></div>";
            echo $this->hargaRental()["tampil"];
            echo "<br>◉ Jenis motor yang dirental " . $this->jenisYangDipilih . " Selama " . $this->lamaRental . " Hari";
            echo "<br>◉ Harga rental per harinya : Rp." . number_format($this->getHarga()[$this->jenisYangDipilih] , 0, '.', '.');
            echo "<br>◉ Besar Yang Harus Dibayar :     " . number_format($this->hargaRental()["hargaRental"], 0, '.', '.') ;
        }
    }
?>
</body>
</html>