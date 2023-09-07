<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No. 18</title>
</head>
<body>
    <form action="" method="post">
        <?php for($i = 1; $i <= 5 ; $i++): ?>
            <h3>Input data siswa ke- <?=$i?></h3>
            <input type="text" name="nama<?=$i?>" placeholder="Nama"><br>
            <!-- Ini digunakan untuk mencetak nilai variabel PHP dalam kode HTML.  -->
            <input type="number" name="mtk<?=$i?>" placeholder="MTK"><br>
            <input type="number" name="indo<?=$i?>" placeholder="INDO"><br>
            <input type="number" name="ing<?=$i?>" placeholder="INGRIS"><br>
            <input type="number" name="dpk<?=$i?>" placeholder="DPK"><br>
            <input type="number" name="agm<?=$i?>" placeholder="AGAMA"><br>
            <input type="number" name="kehadiran<?=$i?>" placeholder="Kehadiran"><br>
        <?php endfor; ?>
        <br><button type="submit" name="submit">submit</button>
    </form>

    <?php
        $juara = '';
        // variabel ini diinisialisasi sebagai string kosong Nanti, variabel ini akan diisi dengan nama siswa yang memenuhi syarat sebagai juara.
        $nama = [];
        $hdr =[];
        $Tnilai = [];
        $jmlh = 0;
        $max = 0;
        // Variabel $max digunakan untuk menyimpan total nilai tertinggi dari seluruh siswa yang memenuhi syarat sebagai juara kelas. 

        if(isset($_POST['submit'])){
            for($i = 1; $i <= 5 ; $i++){

                $namaSiswa = $_POST["nama$i"];
                // fungsi intval() digunakan untuk memastikan bahwa nilai yang diambil dari input atau sumber data lainnya dalam format bilangan bulat 
                $mtks = intval($_POST["mtk$i"]);
                // $_POST["mtk$i"] adalah cara untuk mengakses nilai yang diisi oleh pengguna dalam input field "mtk" sesuai dengan nomor siswa yang sedang di-loop (sesuai dengan nilai $i)
                $indos = intval($_POST["indo$i"]);
                $ings = intval($_POST["ing$i"]);
                $dpks = intval($_POST["dpk$i"]);
                $agms = intval($_POST["agm$i"]);
                $hdrs = intval($_POST["kehadiran$i"]);
                $jmlh = $mtks + $indos + $ings + $dpks + $agms ;

                // untuk menambahkan nilai dari $namaSiswa ke dalam array $nama. Setelah baris ini dijalankan, array $nama akan berisi nama-nama siswa yang telah diinputkan melalui formulir.
                array_push($nama, $namaSiswa);
                array_push ( $hdr, $hdrs );
                array_push($Tnilai, $jmlh);
            }


            for($a = 0; $a <= 4 ; $a++){
                // memeriksa apakah total nilai siswa ke-$a lebih besar dari atau sama dengan 475.
                if($Tnilai[$a] >= 475 && $hdr[$a] == 100){
                    // Ini memeriksa apakah kehadiran siswa ke-$a adalah 100%.
                    if($Tnilai[$a] > $max){
                        // kondisi kedua yang memeriksa apakah total nilai siswa ke-$a lebih besar dari nilai maksimum ($max) yang telah ditemukan sebelumnya. 
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