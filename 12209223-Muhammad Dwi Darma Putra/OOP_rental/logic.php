<?php

class DataBahanBakar {
    private $HargaSSuper;
    private $HargaSVPower;
    private $HargaSVPowerDiesel;
    private $HargaSVPowerNitro;
    public $jenisYangDipilih;
    public $totalLiter;
    protected $totalpembayaran;


    public function setHarga($valSSuper, $valSVpower, $valSVpowerdiesel, $valSVpowernitro) {
        $this->HargaSSuper = $valSSuper;
        $this->HargaSVPower = $valSVpower;
        $this->HargaSVPowerDiesel = $valSVpowerdiesel;
        $this->HargaSVPowerNitro = $valSVpowernitro;
    }

    public function getHarga() {
        $semuadatasolar['SSuper'] = $this->HargaSSuper;
        $semuadatasolar['SVPower'] = $this->HargaSVPower;
        $semuadatasolar['SVPowerDiesel'] = $this->HargaSVPowerDiesel;
        $semuadatasolar['SVPowerNitro'] = $this->HargaSVPowerNitro;
        return $semuadatasolar;
    }   
}

class Pembelian extends DataBahanBakar {
    public function totalHarga() {
        $this->totalpembayaran = $this->getHarga()
        [$this->jenisYangDipilih] *
        $this->totalLiter;
    }

    public function cetakBukti() {
        echo"-----------------------------------";
        echo"Jenis Bahan Bakar : " .
        $this->jenisYangDipilih;
        echo"Total Liter : " . $this->totalLiter;
        echo"Harga Bayar : Rp. " . number_format
        ($this->totalpembayaran, 0, ',', '.');
        echo"-----------------------------------";
    }
}
?>