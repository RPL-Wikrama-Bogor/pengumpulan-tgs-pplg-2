<?php 
    class Motor {
        public $namaCust;
        public $lamaRental;
        public $motorPilihan;
        private $hargaScooter;
        private $hargaCruiser;
        private $hargaScrambler;
        private $listMember = ['Prim', 'Mellark', 'Everdeen'];
        protected $diskon = 0.05;
        public function setHarga($Scooter,$Cruiser,$Scrambler) {
            $this->hargaScooter = $Scooter;
            $this->hargaCruiser = $Cruiser;
            $this->hargaScrambler = $Scrambler;
        }

        public function getlistMember() {
            return $this->listMember;
        }

        public function setListNama($nama) {
            $this->namaCust = $nama;  
        }

        public function getListNama() {
            return $this->namaCust;
        }

        public function getHarga(){
            $allDataMotor["Scooter"] = $this->hargaScooter;
            $allDataMotor["Cruiser"] = $this->hargaCruiser;
            $allDataMotor["Scrambler"] = $this->hargaScrambler;
            return $allDataMotor;
        }
    }

    class Rental extends Motor {
        public function totalRental() {
            $hargaMotor = $this->getHarga();
            $hargaRental = $this->lamaRental * $hargaMotor[$this->motorPilihan] + 10000;
            return $hargaRental;
        }

        public function hargaAdiskon() {
            $hargaMotor = $this->getHarga();
            $hargaRental = $this->lamaRental * $hargaMotor[$this->motorPilihan];
            $diskon = $hargaRental * $this->diskon;
            $hargaTotal = $hargaRental - $diskon + 10000;
            return $hargaTotal;
        }

        public function cetakStruk() {
            $hargaMotor = $this->getHarga();

            if (in_array($this->getListNama(), $this->getlistMember())) {
                echo "<br>--------------STRUK PEMBAYARAN--------------<br>";
                echo "<br> Nama Customer : " . $this->getListNama() . " (Member) <br> Mendapat Diskon 5% " . "<br>";
                echo "Jenis Motor Yang Dipilih : " . $this->motorPilihan . " (" .$this->lamaRental . " hari)" . "<br>";
                echo "Harga Sewa/Hari : Rp. " . number_format($hargaMotor[$this->motorPilihan], 0, ',', '.')  . "<br>";
                echo "Total Harga + Pajak : Rp. " . number_format($this->hargaAdiskon(), 0, ',', '.') . "<br>";
                echo "<br>-------------TERIMA KASIH (๑•̀ㅂ•́)و✧-------------";
        } else {
            echo "<br>--------------STRUK PEMBAYARAN--------------<br>";
            echo "<br> Nama Customer : " . $this->getListNama() . "<br>";
            echo "Jenis Motor Yang Dipilih : " . $this->motorPilihan . " (" .$this->lamaRental . " hari)" . "<br>";
            echo "Harga Sewa/Hari : Rp. " . number_format($hargaMotor[$this->motorPilihan], 0, ',', '.') ."<br>";
            echo "Total Harga + Pajak : Rp. " . number_format($this->totalRental(), 0, ',', '.') . "<br>";
            echo "<br>-------------TERIMA KASIH (๑•̀ㅂ•́)و✧-------------";
        }

    } 
}
?>