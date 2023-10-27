<?php
class RentalMotor {
    private $Beat;
    //variabel tersebut hanya dapat diakses atau dimodifikasi dari dalam kelas yang sama. Variabel private tidak bisa diakses secara langsung dari luar kelas.
    private $Supra;
    private $H2r;
    public $jenisYangDipilih;
    //variabel tersebut dapat diakses dan dimodifikasi langsung dari luar kelas tanpa batasan.
    public $namaVip = ['bass', 'yzd', 'awd'];
    public $lamaWaktu;
    public $nama;
    //variabel tersebut dapat diakses dari dalam kelas itu sendiri dan juga dari subkelas (kelas turunan). Variabel protected tidak dapat diakses secara langsung dari luar kelas atau subkelas tersebut.
    protected $diskon;
    protected $pajak;
    
    function __construct(){
        $this->diskon = 0.05;
        $this->pajak = 10000;
    }
    // deklarasi dari konstruktor kelas. Ini adalah metode khusus yang akan dipanggil saat objek kelas yang sesuai dibuat.
    public function getnamaVip(){
        return $this->namaVip;
    }
    //Ini adalah deklarasi sebuah metode (atau fungsi) dalam sebuah kelas. Kata kunci public menunjukkan bahwa metode ini dapat diakses dari luar kelas, artinya kode lain dapat memanggilnya. Nama metodenya adalah "getnamaVip."
    public function setlistnama($nama){
        $this->nama = $nama;
    }
    // untuk mengatur nilai dari properti $nama pada objek yang menggunakan metode setlistnama. Dengan kata lain, Anda dapat menggunakan metode ini untuk mengubah nilai dari properti $nama pada suatu objek
    public function getlistnama(){
        return $this->nama;
    }
    // untuk mengambil (mengakses) nilai dari properti $nama pada objek yang menggunakan metode getlistnama. Ini adalah metode akses (getter)
    public function setharga($valBeat, $valSupra, $valH2r, ) {
        $this->Beat = $valBeat;
        $this->Supra = $valSupra;
        $this->H2r = $valH2r;
    }
    public function getharga(){
        $semuaDataMotor["Beat"] = $this->Beat;
        $semuaDataMotor["Supra"] = $this->Supra;
        $semuaDataMotor["H2r"] = $this->H2r;
        return $semuaDataMotor;
    }

}

class rental extends RentalMotor{
    public function TotalHarga(){
        $totalHarga = $this->getharga();
        $hargaTotal = $totalHarga[$this->jenisYangDipilih];
        $totalHarga = $hargaTotal * $this->lamaWaktu;
        if (in_array($this->nama,$this->namaVip)){
            $hargaDiskon =
            $hargaTotal * $this->diskon;
            $hargaVip = $totalHarga - $hargaDiskon + $this->pajak;
            return $hargaVip;
        }
        else{
            $hargaBayar = $totalHarga + $this->pajak;
            return $hargaBayar;
        }
        
    }
    public function cetakbukti(){
            echo '<div style="border: 1px solid #ccc; padding: 10px; margin: 20px; text-align: center;">';
            echo '<h2>BUKTI PEMBELIAN</h2>';
            echo '<hr>';
            echo '<p>Nama Penyewa: <strong>' . ucfirst($this->getlistnama()) . '</strong></p>';
            echo '<p>Jenis Motor yang Disewa: <strong>' . ucfirst($this->jenisYangDipilih) . '</strong></p>';
            echo '<p>Harga Motor per Hari: <strong>Rp ' . number_format($this->getharga()[$this->jenisYangDipilih], 0, ',', '.') . '</strong></p>';
            echo '<p>Lama Peminjaman (Hari): <strong>' . $this->lamaWaktu . '</strong></p>';
            echo '<p>Pajak: Rp<strong>' . number_format($this->pajak) . '</strong></p>';
            echo '<p>Total Bayaran: <strong>Rp. ' . number_format($this->TotalHarga(), 0, ',', '.') . '</strong></p>';
            echo '</div>';
    }
}
?>