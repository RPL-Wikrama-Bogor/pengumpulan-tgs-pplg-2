<?php 
class Bioskop {
    protected $Ekonomi = 0,
           $Vip = 0,
           $Eksekutif = 0,
           $KeuntunganEkonomi = 7,
           $KeuntunganVip = 0,
           $KeuntunganEksekutif = 0,
           $TotalTiketTerjual = 0,
           $TotalKeuntungan = 0;


    public function __construct($Ekonomi, $Vip, $Eksekutif) 
    {
        if (!is_numeric($Ekonomi) || !is_numeric($Vip) || !is_numeric($Eksekutif)) 
        {
            exit("<p class='error'>Input harus berupa angka</p>");
        } elseif ($Ekonomi > 50 || $Vip > 50 || $Eksekutif > 50) 
        {
            exit("<p class='error'>Input harus diantara 1 - 50</p>");
        }

        $this->Ekonomi = $Ekonomi;
        $this->Vip = $Vip;
        $this->Eksekutif = $Eksekutif;

        $this->TotalTiketTerjual = $Ekonomi + $Vip + $Eksekutif;

        $this->cariKeuntunganVip();
        $this->cariKeuntunganEksekutif();
        $this->TotalKeuntungan = $this->KeuntunganEkonomi + $this->KeuntunganVip + $this->KeuntunganEksekutif;
    }

    public function cariKeuntunganVip() 
    {
        if ($this->Vip >= 35) {
            $this->KeuntunganVip = 25;
        } elseif ($this->Vip >= 20 && $this->Vip <= 35) {
            $this->KeuntunganVip = 15;
        } else {
            $this->KeuntunganVip = 5;
        }
    }

    public function cariKeuntunganEksekutif() 
    {
        if ($this->Eksekutif >= 40) {
            $this->KeuntunganEksekutif = 20;
        } elseif ($this->Eksekutif >= 20 && $this->Eksekutif < 40) {
            $this->KeuntunganEksekutif = 10;
        } else {
            $this->KeuntunganEksekutif = 2;
        }
    }

    public function outputHasil()
    {
        echo "<p class='total output'> Total tiket terjual :" . $this->TotalTiketTerjual . "</p>";
        echo "<p class='outputEkonomi output'> Tiket ekonomi : " . $this->Ekonomi . "</p>";
        echo "<p class='outputVip output'> Tiket Vip : " . $this->Vip . "</p>";
        echo "<p class='outputEksekutif output'> Tiket Eksekutif : " . $this->Eksekutif . "</p>";
        echo "<p class='total output'> Total Keuntungan : " . $this->TotalKeuntungan . "%</p>";
        echo "<p class='keuntungan output'> Keuntungan Ekonomi : " . $this->KeuntunganEkonomi . "%</p>";
        echo "<p class='keuntungan output'> Keuntungan Vip : " . $this->KeuntunganVip . "%</p>";
        echo "<p class='keuntungan output'> Keuntungan Eksekutif : " . $this->KeuntunganEksekutif . "%</p>";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LKPD No 19</title>
</head>

<body>
    <style>
        body{
            background-color:#94A684;
        }
        .card{
            background-color: #E4E4D0;
            width: 220px;
            height: 240px;
            margin: 10px;
            box-sizing: border-box;
		    padding: 10px;
        }
    </style>
    <div class="card">
    <div class="output-container">
        <form action="" method="post">
            <h2>Bioskop</h2>
            <h3>Masukan Total Tiket</h3>
            <input type="text" class="top-input" name="Ekonomi" placeholder="Ekonomi"><br>
            <input type="text" name="Vip" placeholder="VIP"><br>
            <input type="text" name="Eksekutif" placeholder="Eksekutif"><br>
            <input type="submit" name="submit">
        </form>
        <div class="empty-div">
        
            <?php 
            if (isset($_POST["submit"])) {
                if (empty($_POST["Ekonomi"]) && empty($_POST["Vip"]) && empty($_POST["Eksekutif"])) {
                    echo "<p class='error'>Masukan input terlebih dahulu</p>";
                } else {
                    $Ekonomi = $_POST["Ekonomi"];
                    $Vip = $_POST["Vip"];
                    $Eksekutif = $_POST["Eksekutif"];
                    
                    $Bioskop = new Bioskop($Ekonomi,$Vip,$Eksekutif);
                    $Bioskop->outputHasil();
                }
            }
            ?>
            </div>
        </div>
    </div>
</body>
</html>