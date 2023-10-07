<?php
class Shell {
    protected $pajak;
    private $hondaAdv,
            $hondaBeat,
            $hondaPcx,
            $hondaVario;
    public $nama;
    public $waktu;
    public $jenis;
    protected $listMember = ["ana", "sams", "alex", "ara"];

    function __construct() {
        $this->pajak = 10000;
    }

    public function setHarga($tipe1, $tipe2, $tipe3, $tipe4) {
        $this->hondaAdv = $tipe1;
        $this->hondaBeat = $tipe2;
        $this->hondaPcx = $tipe3;
        $this->hondaVario = $tipe4;
    }

    public function getHarga() {
        $data["hondaAdv"] = $this->hondaAdv;
        $data["hondaBeat"] = $this->hondaBeat;
        $data["hondaPcx"] = $this->hondaPcx;
        $data["hondaVario"] = $this->hondaVario;
        return $data;
    }
}

class Rental extends Shell {
    public function hitungharga() {
        $hargaBayar = 0;
        $dataHarga = $this->getHarga();
        $hargaRental = $this->waktu * $dataHarga[$this->jenis];
        
        if (in_array($this->nama, $this->listMember)) {
            $hargaBayar = ($hargaRental - (($hargaRental * 5) / 100)) + $this->pajak;
            $tampil = $this->nama." berstatus sebagai Member mendapatkan diskon sebesar 5% <br>";
        }else{
            $tampil = $this->nama." bukan Member<br>";
            $hargaBayar = $hargaRental + $this->pajak;
        }
        
        return [
            'hargaRental' => $hargaRental,
            'hargaBayar' => $hargaBayar,
            'dataHarga' => $dataHarga,
            'tampil' => $tampil
        ];
    }

    public function perentalan() {
        echo '<br><center><div>';
        echo $this->hitungharga()['tampil'];
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->waktu . " hari <br>";
        echo "Harga rental per-harinya : " . number_format($this->getHarga()[$this->jenis], 0, '', '.');
        echo "<br><br> Besar yang harus dibayarkan adalah Rp. " . number_format($this->hitungharga()['hargaBayar'], 0, '', '.');
        echo "</div>";
    }
}


?>