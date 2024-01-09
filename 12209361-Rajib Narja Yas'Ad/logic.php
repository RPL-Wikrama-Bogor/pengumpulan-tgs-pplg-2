<?php
class DataMotor
{
    private $hargaMotorButut;
    private $hargaMotorMahal;
    private $hargaMotorBiasa;
    private $listVIP = ['Rajib', 'Raul', 'Bangsul'];

    public $jenisYangDipilih;
    public $lamaWaktu;
    public $nama_pengguna;
    
    protected $totalPembayaran;
    protected $diskon;

    protected $pajak;

    function __construct()
    {
        $this->diskon = 0.05;
        $this->pajak = 10000;
    }

    // mengatur harga motor-motor yang disewakan    
    public function setHarga($Butut, $Mahal, $Biasa) {
        $this->hargaMotorButut = $Butut;
        $this->hargaMotorMahal = $Mahal;
        $this->hargaMotorBiasa = $Biasa;
    }

    public function getListVIP() {
        return $this->listVIP;
    }

    public function setListName($nama){
        $this->nama_pengguna = $nama;
    }

    public function getListName(){
        return $this->nama_pengguna;
    }

    public function getHarga() {
        $semuaDataMotor["MotorButut"] = $this->hargaMotorButut;
        $semuaDataMotor["MotorMahal"] = $this->hargaMotorMahal;
        $semuaDataMotor["MotorBiasa"] = $this->hargaMotorBiasa;
        return $semuaDataMotor;
    }
}

class Pembelian extends DataMotor {
    public function hargaRental()
    {
        $dataHargaMotor = $this->getHarga();
        $hargaRental = $this->lamaWaktu * $dataHargaMotor[$this->jenisYangDipilih];
        $hargaRental = $hargaRental + $this->pajak;
        return $hargaRental;
    }

    public function hargaDiskon()
    {
        $dataHargaMotor = $this->getHarga();
        $hargaRental = $this->lamaWaktu * $dataHargaMotor[$this->jenisYangDipilih];
        $diskon = $hargaRental * $this->diskon;
        $hargaTotalDiskon = $hargaRental + $this->pajak - $diskon;
        return $hargaTotalDiskon;
    }

    public function cetakBukti() 
    {
        $dataHargaMotor = $this->getHarga();

        if (in_array($this->getListName(), $this->getListVIP())) {
            echo "---------------------------------------------------------------------------------<br>";
            echo "Nama Penyewa: " . ucfirst($this->getListName()) . "<br>";
            echo "Jenis Motor yang Disewa: " . ucfirst($this->jenisYangDipilih) . "<br>";
            echo "Harga Motor per Hari: Rp " . number_format($dataHargaMotor[$this->jenisYangDipilih], 0, ',', '.') . "<br>";
            echo "Lama Peminjaman (Hari) : " . $this->lamaWaktu . "<br>";
            echo "Mendapatkan Diskon Sebesar : 5% <br>";
            echo "Pajak : Rp. " . number_format($this->pajak, 0, ',', '.'). "<br>";
            echo "Total Bayaran Setelah Diskon: Rp. " . number_format($this->hargaDiskon(), 0, ',', '.') . "<br>";
            echo "---------------------------------------------------------------------------------<br>";
        } else {
            echo "---------------------------------------------------------------------------------<br>";
            echo "Nama Penyewa: " . ucfirst($this->getListName()) . "<br>";
            echo "Jenis Motor: " . ucfirst($this->jenisYangDipilih) . "<br>";
            echo "Harga Motor per Hari: Rp " . number_format($dataHargaMotor[$this->jenisYangDipilih], 0, ',', '.') . "<br>";
            echo "Lama Peminjaman (Hari) : " . $this->lamaWaktu . "<br>";
            echo "Anda Tidak Mendapatkan Diskon Karena Bukan Membership <br>";
            echo "Pajak : Rp. " . number_format($this->pajak, 0, ',', '.'). "<br>";
            echo "Total Bayaran : Rp. " . number_format($this->hargaRental(), 0, ',', '.') . "<br>";
            echo "---------------------------------------------------------------------------------<br>";
        }
    }
}
?>