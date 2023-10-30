<?php
class Motor {
    public $namaPelanggan;
    protected $pajak,$member=['Ihsan','Andi','Sugi','liong'];
    private $Zx25RR,
            $CBR250RR,
            $Ducati,
            $H2R;
    public $jumlah;
    public $jenis;

    function __construct() {
        $this->pajak = 10000;
    }

    public function setHarga($tipe1, $tipe2, $tipe3, $tipe4) {
        $this->Zx25RR = $tipe1;
        $this->CBR250RR = $tipe2;
        $this->Ducati = $tipe3;
        $this->H2R = $tipe4;
    }

    public function getHarga() {
        $data["Zx25RR"] = $this->Zx25RR;
        $data["CBR250RR"] = $this->CBR250RR;
        $data["Ducati"] = $this->Ducati;
        $data["H2R"] = $this->H2R;
        return $data;
    }
    
}

class Beli extends Motor {

    public function hargaMember(){
        $dataHarga = $this->getHarga();
        $hargaBeli = $dataHarga[$this->jenis];
        $hargaTotal = $hargaBeli * $this->jumlah;

       
        if(in_array($this->namaPelanggan,$this->member)){
            $hargaDiskon =
            $hargaTotal * 0.05;
            $hargaMember =$hargaTotal - $hargaDiskon + $this->pajak;
            return $hargaMember;    
        }
        else{
            $hargaBayar = $hargaTotal +
            $this->pajak;
        return $hargaBayar;
        }
    }
    public function cetakPe1qmbelian() {  
        echo "<center>";
        echo "----------------------------------------------" . "<br>";
        echo "Nama Anda : " . $this->namaPelanggan . "<br>";
        echo "Anda meminjam motor dengan tipe : " . $this->jenis . "<br>";
        echo "Dengan Lama : " . $this->jumlah . " Hari <br>";
        echo "Dengan Harga Perhari : " .number_format($this->getHarga()[$this->jenis], 0, '', '.').  " Hari <br>";
      
        echo "Total yang harus anda bayar Rp. " . number_format($this->hargaMember(), 0, '', '.') . "<br>";
        echo "----------------------------------------------";
        echo "</center>";
    }
}
?>