<?php
class Ruangan {
    protected $ppn;
    private $reguler,
            $vip,
            $vvip;
    public $jamSewa;
    public $jenis;

    function __construct() {
        $this->ppn = 0.1;
    }

    public function setHarga($hargaReguler, $hargaVIP, $hargaVVIP) {
        $this->reguler = $hargaReguler;
        $this->vip = $hargaVIP;
        $this->vvip = $hargaVVIP;
    }

    public function getHarga() {
        $data["reguler"] = $this->reguler;
        $data["vip"] = $this->vip;
        $data["vvip"] = $this->vvip;
        return $data;
    }
}

class SewaRuangan extends Ruangan {
    public function biayaSewa() {
        $dataHarga = $this->getHarga();
        $biayaSewa = $this->jamSewa * $dataHarga[$this->jenis];
        $biayaPPN = $biayaSewa * $this->ppn;
        $totalBiaya = $biayaSewa + $biayaPPN;
        return $totalBiaya;
    }

    public function cetakSewaRuangan() {
        echo "<div class='output-box'>";
        echo "<center>";
        echo "----------------------------------------------" . "<br>";
        echo "Anda menyewa ruangan tipe " . $this->jenis . "<br>";
        echo "Dengan jumlah jam sewa: " . $this->jamSewa . " jam <br>";
        echo "Total biaya yang harus Anda bayar Rp. " . number_format($this->biayaSewa(), 0, '', '.') . "<br>";
        echo "----------------------------------------------";
        echo "Terima Kasih";
        echo "</center>";
        echo "</div>";
    }

}
?>
