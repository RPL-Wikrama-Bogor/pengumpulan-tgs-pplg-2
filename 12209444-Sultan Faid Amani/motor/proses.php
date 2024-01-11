<?php
class Rental {
    private $Matic,
            $Manual,
            $Sport;

    public $perhari,
           $namaPelanggan,
           $jenis;

    protected $listMember = ['Sultan', 'Barvey', 'Ishaq', 'Areka','Reyfal'];
    protected $diskon = 0.05; // Ubah diskon menjadi 5%
    protected $ppn = 10000; // Ubah ppn menjadi 10000

    public function setHarga($tipe1, $tipe2, $tipe3) {
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
    public $jumlah;

    public function hargaSewa() {
        $dataHarga = $this->getHarga();
        $hargaTotal = $this->jumlah * $dataHarga[$this->jenis];

        if (in_array($this->namaPelanggan, $this->listMember)) {
            $tampil = ucfirst($this->namaPelanggan) . " Berstatus Sebagai Member Mendapatkan Diskon 5%";
            $diskon = $this->diskon * $hargaTotal; // Hitung jumlah diskon
        } else {
            $tampil = ucfirst($this->namaPelanggan) . " Bukan Member";
            $diskon = 0;
        }

        $hargaBayar = $hargaTotal - $diskon;

        // Tambahkan PPN (pajak) sebesar 10000
        $hargaBayar += $this->ppn;

        return [
            "hargaTotal" => $hargaTotal,
            "hargaBayar" => $hargaBayar,
            "tampil" => $tampil,
        ];
    }

    public function cetakSewa() {
        echo "<center>";
        $dataHarga = $this->getHarga();
        $hargaSewa = $dataHarga[$this->jenis];
        $hasilSewa = $this->hargaSewa();

        echo $hasilSewa["tampil"] . "<br>";
        echo "----------------------------------------------" . "<br>";
        echo "<br>Jenis  " . $this->jenis . " Selama " . $this->jumlah . " Hari";
        echo "<br>Harga per harinya : Rp." . number_format($hargaSewa, 0, '.', ',');
        echo "<br>Harga total: Rp. " . number_format($hasilSewa["hargaBayar"], 0, '.', ','). "<br>" ;
        echo "----------------------------------------------" . "<br>";
        echo "</center>";
    }
}
?>
