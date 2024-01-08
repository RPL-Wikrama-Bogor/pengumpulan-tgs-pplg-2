<?php 
    class DataRentalMotor {
        public $namaPeminjam,
                $lamaRental,
                $jenisYangDipilih;

        private $motorSuprabapak,
                $motoradv,
                $motorVario,
                $motorAeroxngabers;
        
        protected $listMember = ['andi', 'mujurudin', 'sugi', 'sukria'],
                $diskon = 0,
                $pajak,
                $totalHarga;

        function __construct() {
            $this->pajak = 10000;
        }

        public function setHarga ($Suprabapak, $adv, $Vario, $Aeroxngabers) {
            $this->motorSuprabapak = $Suprabapak;
            $this->motoradv = $adv;
            $this->motorVario = $Vario;
            $this->motorAeroxngabers = $Aeroxngabers;
        }

        public function getHarga() {
            $semuaDataMotor["Suprabapak"] = $this->motorSuprabapak;
            $semuaDataMotor["adv"] = $this->motoradv;
            $semuaDataMotor["Vario"] = $this->motorVario;
            $semuaDataMotor["Aeroxngabers"] = $this->motorAeroxngabers;


            return $semuaDataMotor;
        }
    }
    
    class Pembelian extends DataRentalMotor {
        public function hargaRental () {
            $dataHarga = $this->getHarga();
            $hargaTotal = $this->lamaRental * $dataHarga[$this->jenisYangDipilih];
           
            if (in_array($this->namaPeminjam,$this->listMember)) {
                // $hargaDiskon = $hargaTotal * 0.05;
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
            echo $this->hargaRental()["tampil"];
            echo "<br>Jenis motor yang dirental adalah " . $this->jenisYangDipilih . " Selama " . $this->lamaRental . " Hari";
            echo "<br>Harga rental per harinya : Rp." . number_format($this->getHarga()[$this->jenisYangDipilih] , 0, '.', '.');
            echo "<br>Besar Yang Harus Dibayarkan Adalah Rp. " . number_format($this->hargaRental()["hargaRental"], 0, '.', '.') ;
        }
    }
?>