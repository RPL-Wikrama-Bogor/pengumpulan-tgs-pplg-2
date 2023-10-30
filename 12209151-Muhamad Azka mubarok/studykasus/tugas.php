<?php

class RentalMotor {
    public $nama,
        $waktu,
        $jenisMotor;
    
    private $matic,
        $sport,
        $trail,
        $skuter;

    protected $member = ['sukri', 'sugi', 'yoga', 'andi', 'agus'];
    protected $totalHarga;
    protected $pajak;
    protected $diskon;

    function __construct() {
        $this->diskon = 0.05;
        $this->pajak = 10000;
    }

    public function setHarga($matic, $sport, $trail, $skuter) {
        $this->matic = $matic;
        $this->sport = $sport;
        $this->trail = $trail;
        $this->skuter = $skuter;
    }

    public function getHarga() {
        $semuaMotor['matic'] = $this->matic;
        $semuaMotor['sport'] = $this->sport;
        $semuaMotor['trail'] = $this->trail;
        $semuaMotor['skuter'] = $this->skuter;

        return $semuaMotor;
    }
}

class Pembelian extends RentalMotor {
    public function totalHarga() {
        $this->totalHarga = $this->getHarga()[$this->jenisMotor] * $this->waktu;
        return $this->totalHarga;
    }

    public function cetakBukti() {
        if (in_array(strtolower($this->nama), $this->member)) {
            $this->diskon = ($this->totalHarga * $this->diskon);
            echo $this->nama . " Berstatus Member Mendapatkan 5% diskon";
        } else {
            $this->diskon = 0;
            echo $this->nama . " Tidak Berstatus Member";
        }
        echo "<br>Jenis Motor yang di rental adalah " .  $this->jenisMotor . " selama " . $this->waktu . " Hari ";
        echo "<br>Harga Rental Per-harinya: " . ($this->totalHarga) / $this->waktu;
        echo "<br>Besar Pajak: " . $this->pajak;
        echo "<br>Besar Harga Ditambah Pajak: " . ($this->totalHarga + $this->pajak - $this->diskon);
    }
}

?>
