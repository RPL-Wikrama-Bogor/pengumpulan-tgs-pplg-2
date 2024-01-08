<?php 
    class DataRentalMotor {
        // public agar dapat diakses dan digunakan dari luar kelas.
        public $namaPeminjam, 
                $lamaRental,
                $jenisYangDipilih;

        // private untuk membatasi akses ke metode tersebut hanya dalam kelas yang sama dan tidak bisa diakses dari luar kelas.
        private $motorBeat,
                $motorVespa,
                $motorVario,
                $motorNinjaZX;
        
        // protected untuk memungkinkan akses ke metode tersebut hanya dalam kelas yang sama dan kelas turunan 
        protected $listMember = ['angga', 'agus', 'sugi', 'sukria'],
                $diskon = 0,
                $pajak,
                $totalHarga;

        // Variabel pajak diinisialisasi dalam construct agar setiap objek yang dibuat dari kelas ini
        // memiliki nilai pajak yang sama saat objek tersebut diciptakan.
        function __construct() {
            $this->pajak = 10000;
            $this->diskon = 0.05;
        }

        // Metode setHarga digunakan untuk mengatur harga motor dengan menerima empat parameter 
        //(Beat, Vespa, Vario, NinjaZX) dan menyimpannya dalam properti-properti motor pada objek.
        public function setHarga ($Beat, $Vespa, $Vario, $NinjaZX) {
            $this->motorBeat = $Beat;
            $this->motorVespa = $Vespa;
            $this->motorVario = $Vario;
            $this->motorNinjaZX = $NinjaZX;
        }

        // Metode getHarga mengembalikan daftar harga motor dalam bentuk array asosiatif 
        // dengan jenis motor sebagai kunci dan harga sebagai nilainya.
        public function getHarga() {
            $semuaDataMotor["Beat"] = $this->motorBeat;
            $semuaDataMotor["Vespa"] = $this->motorVespa;
            $semuaDataMotor["Vario"] = $this->motorVario;
            $semuaDataMotor["NinjaZX"] = $this->motorNinjaZX;

            return $semuaDataMotor;
        }
    }
    
    // extends adalah kelas turunan dari kelas sebelumnya
    class Pembelian extends DataRentalMotor {
        public function hargaRental () {
            $dataHarga = $this->getHarga();
            $hargaTotal = $this->lamaRental * $dataHarga[$this->jenisYangDipilih];
           
            // mengecek apakah nama tersebut termasuk member atau bukan
            if (in_array($this->namaPeminjam, $this->listMember)) {
                // $hargaDiskon = $hargaTotal * $this->diskon
                $tampil = ucwords($this->namaPeminjam) . " Berstatus Sebagai Member Mendapatkan Diskon 5%";
                $hargaRental = $hargaTotal - ($hargaTotal * $this->diskon) + $this->pajak;
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

        // output nya
        public function cetakBukti() {
            echo $this->hargaRental()["tampil"];
            echo "<br>Jenis motor yang dirental adalah " . $this->jenisYangDipilih . " Selama " . $this->lamaRental . " Hari";
            echo "<br>Harga rental per harinya : Rp." . number_format($this->getHarga()[$this->jenisYangDipilih] , 0, '.', '.');
            echo "<br>Harga Pajak : Rp. " . number_format($this->pajak, 0, '.', '.');
            echo "<br>Besar Yang Harus Dibayarkan Adalah Rp. " . number_format($this->hargaRental()["hargaRental"], 0, '.', '.') ;
        }
    }
?>