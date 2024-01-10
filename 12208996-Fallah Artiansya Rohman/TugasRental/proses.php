<?php
class Motor {
    //class motor isinya ada visibility public yang fungsinya buat public data tersebut
    //protected karena variebel yang dipakai akan dipakai lagi dikelas turunan
    //private untuk menyembunyikan data yang tidak ingin dipublic
    public $namaPelanggan;
    protected $pajak,$member=['sadan','azqii','kalan','banu','baim','nazir'];
    private $scooter,
            $scopy,
            $vario,
            $miosmile;
    public $jumlah;
    public $jenis;
    // memungkinkan untuk menginisialisasi properti objek setelah pembuatan objek
    function __construct() {
        $this->pajak = 10000;
    }
    //yang didalam kurung buka diambil dari file index yang ada isi harganya
    public function setHarga($tipe1, $tipe2, $tipe3, $tipe4) {
        $this->scooter = $tipe1;
        $this->scopy = $tipe2;
        $this->vario = $tipe3;
        $this->miosmile = $tipe4;
    }
    //untuk mengambil harga dari data dengan nama motor yang sudah diisi dengan variabel di function setharga 
    public function getHarga() {
        $data["scooter"] = $this->scooter;
        $data["scopy"] = $this->scopy;
        $data["vario"] = $this->vario;
        $data["miosmile"] = $this->miosmile;
        return $data;
    }
    
}

class Beli extends Motor {
//class turunan dari class motor
//function ini digunakan untuk menghotung rumus yang akan dioutput nanti
    public function hargaMember(){
        $dataHarga = $this->getHarga();
        $hargaBeli = $dataHarga[$this->jenis];
        //harga beli untuk menghitung isi dari harga motor yang dipilih user
        $hargaTotal = $hargaBeli * $this->jumlah;
        //harga sewa yang dipilih user dikali dengan jumlah hari

       //jika didalam array nama pelanggan ada didalam variabel member 
       //return digunakan untuk mengembalikan agar variabel ada isinya
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
    //membuat function dengan nama cetak pembelian nama anda diambil dari variabel nama pelanggan yang isinya 
    //diinput oleh user 
    public function cetakPembelian() { 
        echo "<table>"; 
        echo "<center>";
        echo "----------------------------------------------" . "<br>";
        echo "Nama Anda : " . $this->namaPelanggan . "<br>";
        if(in_array($this->namaPelanggan,$this->member)) {
        echo "Anda mendapatkan diskon : 5% "  . "<br>" ;}
        echo "Anda meminjam motor dengan tipe : " . $this->jenis . "<br>";
        echo "Dengan Lama : " . $this->jumlah . " Hari <br>";
        //number_format agar menjadi rupiah yang diformat,function get harga dengan isi harga jenis motor yang dipilih(perhari)
        echo "Harga Rental Per Harinya : " .number_format($this->getHarga()[$this->jenis], 0, '', '.').  "<br>";
        //yang di format function harga member dengan isi percabangan yang ada di function (yang di return)
        echo "Yang Harus Dibayar Rp. " . number_format($this->hargaMember(), 0, '', '.') . "<br>";
        echo "----------------------------------------------";
        echo "</center>";
        echo "<table>";
    }
}
?>