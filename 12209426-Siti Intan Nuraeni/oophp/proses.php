<?php 
    class Rental {
        
        public $namaPelanggan,
               $waktuRental,
               $motorYangDipilih;

        private $hargaScooter,
                $hargaSport,
                $hargaCross;
                
        private $member = ["siti", "intan", "nuraeni"];
        
        protected $totalPembayaran,
                  $diskon,
                  $pajak;

        function __construct() 
        {
            $this->diskon = 0.05;
        }

    
        public function setHarga($hargaScooter, $hargaSport, $hargaCross) {
            $this->$hargaScooter = $hargaScooter;
            $this->$hargaSport = $hargaSport;
            $this->$hargaCross = $hargaCross;
        }

        public function getMember() {
            return $this->member;
        }

        public function setListNama($nama) {
            $this->namaPelanggan = $nama;
        }

        public function getListNama() {
            return $this->namaPelanggan;
        }

        public function getHarga(){
            $semuaDataMotor["Scooter"] = $this->hargaScooter;
            $semuaDataMotor["Sport"] = $this->hargaSport;
            $semuaDataMotor["Cross"] = $this->hargaCross;
            return $semuaDataMotor;
        }
    }

    class Pembelian extends Rental {
        public function totalHargaRental() {
            $hargaMotor = $this->getHarga();
            $hargaRental = $this->waktuRental * $hargaMotor[$this->motorYangDipilih];
            $hargaRental += 10000;
            return $hargaRental;
        }

        public function hargaDiskon() {
            $hargaMotor = $this->getHarga();
            $hargaRental = $this->waktuRental * $hargaMotor[$this->motorYangDipilih];
            $diskon = $hargaRental * $this->diskon;
            $totalDiskon = $hargaRental - $diskon + 10000;
            return $totalDiskon;
        }

        public function cetakRental() {
            $hargaMotor = $this->getHarga();

            if (in_array($this->getListNama(), $this->getMember())) {
                echo "------------------------------------- <br>";
                echo "Nama Pelanggan: " .ucfirst($this->getListNama()). "  berstatus sebagai member";
                echo "<br>";
                echo "Jenis Motor Yang Disewa: " .ucfirst($this->motorYangDipilih) . "<br>";
                echo "Harga Rental Per Hari: Rp. " .number_format($hargaMotor[$this->motorYangDipilih], 0, ',', '.')  . "<br>";
                echo "Waktu Peminjaman (hari): " .$this->waktuRental . "<br>";
                echo "Mendapatkan Diskon Sebesar 5% <br>";
                echo "Biaya Pajak Sebesar Rp.10.000 <br>";
                echo "Besar yang harus dibayarkan adalah: Rp. " . number_format($this->hargaDiskon(), 0, ',', '.') . "<br>";
                echo "------------------------------------- <br>";
        } else {
            echo "------------------------------------- <br>";
            echo "Nama Pelanggan: " .ucfirst($this->getListNama()) . "<br>";
            echo "Jenis Motor Yang Disewa: " .ucfirst($this->motorYangDipilih) . "<br>";
            echo "Harga Sewa Per Hari: Rp. " .number_format($hargaMotor[$this->motorYangDipilih], 0, ',', '.')  . "<br>";
            echo "Waktu Peminjaman (hari): " .$this->waktuRental . "<br>";
            echo "Tidak Ada Diskon untuk Pelanggan yang bukan member <br>";
            echo "Biaya Pajak Sebesar Rp.10.000 <br>";
            echo "Total Harga Yang Harus Dibayar Setelah Diskon: Rp. " . number_format($this->totalHargaRental(), 0, ',', '.') . "<br>";
            echo "------------------------------------- <br>";
        }

    } 
}
?>