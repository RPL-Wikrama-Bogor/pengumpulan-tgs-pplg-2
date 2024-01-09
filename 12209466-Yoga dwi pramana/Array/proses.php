<?php
class DataHargaMotor{

    public $namaPelanggan;
    public $waktu;
    public $diskon;
    public $jenisYangDipilih;
    
    private $HargaScooter;
    private $HargaAerox;
    private $HargaVario;
    private $HargaBeat;
    
    protected $listmember = ['ana', 'sam', 'alex', 'ana'];
    protected $totalHarga;


    function __construct(){
        $this->pjk = 10000;
        $this->diskon = 0.05;
    }

    // mengambil 
    public function setHarga($scooter, $aerox, $vario, $beat) {
        $this->HargaScooter = $scooter;
        $this->HargaAerox = $aerox;
        $this->HargaVario = $vario;
        $this->HargaBeat = $beat;
    }

    // dan mengisi data ke dalam objek.
    public function getHarga() {
        $dataMotor['scooter'] = $this->HargaScooter;
        $dataMotor['aerox'] = $this->HargaAerox;
        $dataMotor['vario'] = $this->HargaVario;
        $dataMotor['beat'] = $this->HargaBeat;

        return $dataMotor;
    }
}

class Peminjaman extends DataHargaMotor {
    public function totalHarga() {
       $this->totalHarga = $this->getHarga()[$this->jenisYangDipilih] * $this->waktu;
       return $this->totalHarga;
    }


    public function cetakStruk(){
        echo "<center>";
        echo "<div class='container'>";
    //  in_array  untuk memeriksa suatu nilai di dalam sebuah array, fungsi in_array mengembalikan nilai TRUE jika nilai yang di cari ditemukan, dan mengembalikan nilai FALSE jika sebaliknya.
    // array_map untuk mengirimkan setiap nilai array ke fungsi buatan pengguna dan mengembalikan array dengan nilai baru, yang diberikan oleh fungsi buatan pengguna.
        if(in_array(strtolower($this->namaPelanggan), array_map('strtolower', $this->listmember))) {
         $this->diskon = ($this->totalHarga * $this->diskon);
         echo $this->namaPelanggan . " Bersetatus Member Mendapatkan 5% Diskon ";
        } else {
         $this->diskon = 0;
         echo $this->namaPelanggan . " Tidak Bersetatus Member";
        }
        
         echo "<br>Jenis Motor yang di rental adalah " .  $this->jenisYangDipilih . " selama " . $this->waktu . " Hari ";
         echo "<br>Harga Rental Per-harinya : " . ($this->totalHarga) / $this->waktu;
         echo "<br>Besar Pajak : " . $this->pjk;
         echo "<br>Besar Harga Di Tambah Pajak : " . ($this->totalHarga + $this->pjk - $this->diskon);  
         echo "</div>";
         echo "<br>";
         echo "</center>";
    }
}
