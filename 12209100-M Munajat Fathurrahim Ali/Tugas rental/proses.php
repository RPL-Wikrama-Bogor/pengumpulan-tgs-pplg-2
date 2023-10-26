<?php
class Rental {
    private $Matic,
            $Manual,
            $Sport;

    public $perhari,
           $namaPelangan,
           $jenis;

    protected $listMember = ['Hal', 'Ru', 'Har', 'Yon   '],
    $diskon = 0,
    $ppn,
    $totalHarga;

    function __construct() {
        $this->ppn = 10000;
    }
    public function setHarga($tipe1,$tipe2,$tipe3) {
        $this->Matic = $tipe1;
        $this->Manual = $tipe2;
        $this->Sport = $tipe3;
    }
    public function getHarga() {
        $data["Matic"] = $this->Matic;
        $data["Manual"] = $this->Manual;
        $data["Sport"] = $this->Sport;
        return $data;
    }
}
class Sewa extends Rental {
    public function hargaSewa() {
        $dataHarga = $this->getHarga();
        $hargaTotal = $this->jumlah * $dataHarga[$this->jenis];

        if (in_array($this->namaPelanggan, $this->listMember)) {
            $tampil = ucfirst($this->namaPelanggan) . " Berstatus Sebagai Member Mendapatkan Diskon 5%";
            $hargaBayar = $hargaTotal - ($hargaTotal * 0.05) + $this->ppn;
        } else {
            $tampil = ucfirst($this->namaPelanggan) . " Bukan Member";
            $hargaBayar = $hargaTotal + $this->ppn;
        }

        return [
            "hargaTotal" => $hargaTotal,
            "hargaBayar" => $hargaBayar,
            "tampil" => $tampil,
        ];
    }

    public function cetakSewa() {
        echo "<center>";
        $dataHarga = $this->hargaSewa();
        echo $dataHarga["tampil"];
        echo "<br>";
        echo "----------------------------------------------" . "<br>";
        echo "<br>Jenis  " . $this->jenis . " Selama " . $this->jumlah . " Hari";
        echo "<br>Harga per harinya : Rp." . number_format($this->getHarga()[$this->jenis], 0, '.', ',');
        echo "<br>Harga total: Rp. " . number_format($dataHarga["hargaBayar"], 0, '.', ',') . "<br>";
        echo "----------------------------------------------" . "<br>";
        echo "</center>";
    }
}
?>




