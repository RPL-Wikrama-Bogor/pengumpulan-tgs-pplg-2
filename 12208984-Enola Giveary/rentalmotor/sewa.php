 <?php 
    class Motor {
        private $hargaAerox;
        private $hargaVespa;
        private $hargaNMAX;
        private $hargaNinja;
        private $listMember = ['jeonghan', 'mingyu', 'wonwoo'];
        
        public $motorYangDipilih;
        public $waktuRental;
        public $namaPelanggan;
        
        protected $totalPembayaran;
        protected $diskon;

        protected $pajak;
 
        function __construct() 
        {
            $this->diskon = 0.05;
        }

    
        public function setHarga($Aerox,$Vespa,$NMAX,$Ninja) {
            $this->hargaAerox = $Aerox;
            $this->hargaVespa = $Vespa;
            $this->hargaNMAX = $NMAX;
            $this->hargaNinja = $Ninja;
        }

        public function getlistMember() {
            return $this->listMember;
        }

        public function setListNama($nama) {
            $this->namaPelanggan = $nama;
        }

        public function getListNama() {
            return $this->namaPelanggan;
        }

        public function getHarga(){
            $semuaDataMotor["Aerox"] = $this->hargaAerox;
            $semuaDataMotor["Vespa"] = $this->hargaVespa;
            $semuaDataMotor["NMAX"] = $this->hargaNMAX;
            $semuaDataMotor["Ninja"] = $this->hargaNinja;
            return $semuaDataMotor;
        }


    }

    class Rental extends Motor {
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

            if (in_array($this->getListNama(), $this->getlistMember())) {
                echo "--------------------------------------------------- <br>";
                echo "Nama Pelanggan: " .ucfirst($this->getListNama()) . "<br>";
                echo "Jenis Motor Yang Disewa: " .ucfirst($this->motorYangDipilih) . "<br>";
                echo "Harga Sewa Per Hari: Rp. " .number_format($hargaMotor[$this->motorYangDipilih], 0, ',', '.')  . "<br>";
                echo "Waktu Peminjaman : " .$this->waktuRental . " Hari ". "<br>";
                echo "Mendapatkan Diskon Sebesar 5% <br>";
                echo "Biaya Pajak Sebesar Rp.10.000 <br>";
                echo "Total Harga Yang Harus Dibayar Setelah Diskon Dan Pajak: Rp. " . number_format($this->hargaDiskon(), 0, ',', '.') . "<br>";
                echo "--------------------------------------------------- <br>";
        } else {
            echo "------------------------------------------------------- <br>";
            echo "Nama Pelanggan: " .ucfirst($this->getListNama()) . "<br>";
            echo "Jenis Motor Yang Disewa: " .ucfirst($this->motorYangDipilih) . "<br>";
            echo "Harga Sewa Per Hari: Rp. " .number_format($hargaMotor[$this->motorYangDipilih], 0, ',', '.')  . "<br>";
            echo "Waktu Peminjaman : " .$this->waktuRental . " Hari "."<br>";
            echo "Tidak Ada Diskon untuk Pelanggan yang bukan member <br>";
            echo "Biaya Pajak Sebesar Rp.10.000 <br>";
            echo "Total Harga Yang Harus Dibayar Setelah Diskon Dan Pajak: Rp. " . number_format($this->totalHargaRental(), 0, ',', '.') . "<br>";
            echo "-------------------------------------------------------- <br>";
        }

    } 
}
?>