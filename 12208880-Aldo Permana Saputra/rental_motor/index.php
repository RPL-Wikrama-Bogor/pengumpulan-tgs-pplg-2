<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental</title>
</head>

<body>
    <center>
        <table>
            <form action="" method="post">
                <tr>
                    <td>Nama Pelanggan : </td>
                    <td>
                        <input type="text" name="nama" required>
                    </td>
                </tr>

                <tr>
                    <td>Lama Waktu Rental (per hari)</td>
                    <td>
                        <input type="number" name="lama" required>
                    </td>
                </tr>

                <tr>
                    <td>Jenis Motor : </td>
                    <td>
                        <select name="jenis" required>
                            <option value="mio">Mio</option>
                            <option value="r15">R15</option>
                            <option value="r6">R6</option>
                            <option value="zx">ZX</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Beli" name="kirim"></td>
                </tr>
            </form>
        </table>
    </center>
</body>

</html>


<?php
class RentalMotor
{
    public $nama;
    public $lama;
    public $jenis;

    public $diskon;

    public $member;
    public $harga_motor = [
        'mio' => 70000,
        'r15' => 70000,
        'r6' => 70000,
        'zx' => 70000,
    ];
    protected $pajak = 10000;




    private function namaMember($nama)
    {
        $Member = array("aldo", "Aldi");
        return in_array(strtolower($nama), $Member); // Ubah nama menjadi huruf kecilll
    }

    public function __construct($nama, $lama, $jenis) // buat ngeset variabel yang udah pasti
    {
        $this->nama = $nama;
        $this->lama = $lama;
        $this->jenis = $jenis;
        $this->member = $this->namaMember($nama);
    }
}




class proses extends RentalMotor
{


    public function hitungTotalHarga()
    {
        $hargaPerHari = $this->harga_motor[$this->jenis]; // Harga per hari motor
        $diskon = $this->member ? 0.05 : 0; // Diskon 5% jika member, 0% jika bukan
        $hasilDiskon = ($hargaPerHari * $this->lama + $this->pajak) * $diskon;
        $totalHarga = $hargaPerHari * $this->lama + $this->pajak - $hasilDiskon; // Harga per hari * jumlah hari * (1 + pajak) * (1 - diskon)
        return $totalHarga;
    }

    //nilai yang diksih ke construck sebagi input

    public function tampilkanRincian()
    {
        echo $this->nama . " berstatus sebagai " . ($this->member ? "Member" : "Non-Member") . " mendapatkan diskon sebesar " . ($this->member ? "5%" : "0%") . "<br>";
        echo "Jenis motor yang dirental adalah " . $this->jenis . " selama " . $this->lama . " hari<br>";
        echo "Harga rental per harinya: Rp " . $this->harga_motor[$this->jenis] . "<br>";
        echo "Total Harga Rental Sebelum Pajak: Rp " . ($this->harga_motor[$this->jenis] * $this->lama) . "<br>";
        echo "Pajak: 10000" . "<br>";
        echo "Total Harga Yang harus dibayar: Rp " . $this->hitungTotalHarga() . "<br>";
    }
}

if (isset($_POST['kirim'])) {
    $nama = $_POST['nama'];
    $lama = $_POST['lama'];
    $jenis = $_POST['jenis'];

    $rental = new proses($nama, $lama, $jenis); // membuat objek dari kelas 
    $rental->tampilkanRincian();
}
?>