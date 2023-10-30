<?php 
    class DataRentalMotor {
        // dapat diakses dari luar class, baik itu dari dalam class lain atau dari luar class.
        public $namaPeminjam,
                $lamaRental,
                $jenisYangDipilih;

        private $motorBeat,
                $motorVespa,
                $motorVario,
                $motorNinjaZX;
        
        // diakses dan dimodifikasi dari dalam class yang sama atau dari subclass (class turunan, class yang memiliki properti tersebut)
        protected $listMember = ['angga', 'agus', 'sugi', 'sukria'],
                $diskon = 0,
                $pajak,
                $totalHarga;

        function __construct() {
            $this->pajak = 10000;
            $this->diskon = 0.05;
        }

        public function setHarga ($Bmw, $Vespa, $Trail, $NinjaZX) {
            $this->motorSport = $Bmw;
            $this->motorScooter = $Vespa;
            $this->motorTrail = $Trail;
            $this->motorNinja = $NinjaZX;
        }

        public function getHarga() {
            $semuaDataMotor["Bmw"] = $this->motorSport;
            $semuaDataMotor["Vespa"] = $this->motorScooter;
            $semuaDataMotor["Trail"] = $this->motorTrail;
            $semuaDataMotor["NinjaZX"] = $this->motorNinja;

            return $semuaDataMotor;
        }
    }
    
    class Pembelian extends DataRentalMotor {
        public function hargaRental () {
            $dataHarga = $this->getHarga();
            $hargaTotal = $this->lamaRental * $dataHarga[$this->jenisYangDipilih];
           
            if (in_array($this->namaPeminjam,$this->listMember)) {
                // $hargaDiskon = $hargaTotal * 0.05;
                $tampil = ucwords($this->namaPeminjam) . " Berstatus Sebagai Member Mendapatkan Diskon 10%";
                $hargaRental = $hargaTotal - ($hargaTotal * 0.10) + $this->pajak;
            } else {
                $tampil = ucwords($this->namaPeminjam) . " Bukan Member";
                $hargaRental = $hargaTotal + $this->pajak;
            }
            return [
                "hargaTotal" => $hargaTotal,
                "hargaRental" => $hargaRental,
                "tampil" => $tampil,
            ];
        }

        public function cetakBukti() {
            echo $this->hargaRental()["tampil"];
            echo "<br>Jenis motor yang dirental adalah " . $this->jenisYangDipilih . " Selama " . $this->lamaRental . " Hari";
            echo "<br>Harga rental per harinya : Rp." . number_format($this->getHarga()[$this->jenisYangDipilih] , 0, '.', '.');
            echo "<br>Harga pajak : Rp." . number_format($this->pajak , 0, '.', '.');
            echo "<br>Besar Yang Harus Dibayarkan Adalah Rp. " . number_format($this->hargaRental()["hargaRental"], 0, '.', '.') ;
        }
    }
?>