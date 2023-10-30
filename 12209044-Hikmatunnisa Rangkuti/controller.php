<?php

class RentalMotor {
    protected $pajak;
    protected $diskon;
    private $member = ['ucup', 'udin', 'agus']; 
    private $hargaMotors = [
        'vario' => 50000,
        'mio' => 70000,
        'scoopy' => 100000,
    ];
    function __construct() {
        $this->pajak = 10000;  
        $this->diskon = 0.05;
    }

    public function setBiaya($nama, $waktuPinjam, $tipeMotor) {
        if (isset($this->hargaMotors[$tipeMotor])) {
            $hargaMotor = $this->hargaMotors[$tipeMotor];
        } else {
            echo "Jenis motor tidak valid.";
            return;
        }

        $memberr = in_array($nama, $this->member);
        if ($memberr){
            $totalHarga = $this->hargaMotors[$tipeMotor] * $waktuPinjam;
            $diskonHarga = $totalHarga * $this->diskon;
            $hargaAfterPajak = $totalHarga - $diskonHarga + $this->pajak;
        } else {
            $totalHarga = $this->hargaMotors[$tipeMotor] * $waktuPinjam;
            $hargaAfterPajak= $totalHarga+$this->pajak;
        }
    
       
            echo "<div class='container'>";
            echo "Nama: $nama<br>";
            //ternqry if sblm ttd 
            echo "Jenis Motor: $tipeMotor<br>";
            echo "Peminjaman selama: $waktuPinjam hari<br>";
            echo "Harga sewa per hari: Rp. ". number_format($hargaMotor, 0, ',', '.' ) . "<br>";
            echo $memberr ? "Harga Member" : "Harga Bukan Member";
            echo "<br>";
            echo $memberr ?  "Diskon: Rp. ($this->diskon * 100) %<br>" : "";
            echo "Total yang harus dibayar (termasuk pajak): Rp. ". number_format($hargaAfterPajak, 0, ',', '.' ) . "<br>";
            echo "</div>";
    }
}



?>