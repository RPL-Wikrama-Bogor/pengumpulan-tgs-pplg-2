<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nilai Siswa</title>
</head>
<body>
    <form action="" method="post">
        <?php for($i = 1; $i <= 5 ; $i++): ?>
            <h3>Input data siswa ke- <?=$i?></h3>
            <input type="text" name="nama<?=$i?>" placeholder="Nama"><br>
            <input type="number" name="mtk<?=$i?>" placeholder="Nilai MTK"><br>
            <input type="number" name="indo<?=$i?>" placeholder="Nilai INDO"><br>
            <input type="number" name="ing<?=$i?>" placeholder="Nilai INGGRIS"><br>
            <input type="number" name="dpk<?=$i?>" placeholder="Nilai DPK"><br>
            <input type="number" name="agm<?=$i?>" placeholder="Nilai AGAMA"><br>
            <input type="number" name="kehadiran<?=$i?>" placeholder="Kehadiran"><br>
        <?php endfor; ?>
        <br><button type="submit" name="submit">submit</button>
    </form>

    <?php
        $juara = '';
        $nama = [];
        $hdr =[];
        $Tnilai = [];
        $jmlh = 0;
        $max = 0;

        if(isset($_POST['submit'])){
            for($i = 1; $i <= 5 ; $i++){

                $namaSiswa = $_POST["nama$i"];
                $mtks = intval($_POST["mtk$i"]);
                $indos = intval($_POST["indo$i"]);
                $ings = intval($_POST["ing$i"]);
                $dpks = intval($_POST["dpk$i"]);
                $agms = intval($_POST["agm$i"]);
                $hdrs = intval($_POST["kehadiran$i"]);
                $jmlh = $mtks + $indos + $ings + $dpks + $agms ;

                array_push($nama, $namaSiswa);
                array_push ( $hdr, $hdrs );
                array_push($Tnilai, $jmlh);
            }


            for($a = 0; $a <= 4 ; $a++){
                if($Tnilai[$a] >= 475 && $hdr[$a] == 100){
                    if($Tnilai[$a] > $max){
                        $max = $Tnilai[$a];
                        $juara = $nama[$a];
                    }
                }
            }
            echo "<br>Juara Kelas: ".$juara." dengan total nilai yaitu ". $max ."<hr>";
        }
    ?>
</body>
</html>