<?php
// $siswa = array index dan didalam 
$siswa = [
    // Array multi dimensi
    [
        "nama"=>"Fathur",
        "nis" =>12209100,
        "rombel" => "PPLG XI-2",
        "rayon" => "Cisarua 3",
        "umur" => 17
    ],
    [
        "nama"=>"Reyfal",
        "nis" =>12209380,
        "rombel" => "PPLG XI-2",
        "rayon" => "Cicurug 1",
        "umur" => 16
    ],
    [
        "nama"=>"Sultan",
        "nis" =>12209444,
        "rombel" => "PPLG XI-2",
        "rayon" => "Wikrama 3",
        "umur" => 16
    ],
    [
        "nama"=>"Eka",
        "nis" =>12209000,
        "rombel" => "PPLG XI-2",
        "rayon" => "Tajur 1",
        "umur" => 17
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namasiswa</title>
</head>

<!--Bagian cari siswa -->
<form action="" method="post">
    <p>Opsi 1 :jika di klik menampilkan data yang memiliki umur >= 17</p>
    <p>Opsi 2 :menampilkan data diri mana yang dicari</p>
    <body>
        <ul>
            <li> 
                <a href="?SIII">Cari siswa yang sudah berusia lebih dari 17 tahun </a>
            </li>
            <li>
                <label for="nama">Cari berdasarkan nama:</label>
                <input type="text" id="nama" name="nama">
                <button type="submit" name="submit">Kirim</button>
            </li>
            </ul>
        </form>
        <!-- Untuk mencari siswa yang sudah berusia lebih dati 17 tahun  -->
        <?php
        if(isset($_GET['SIII'])) {
            foreach ($siswa as $data){
                if($data['umur']>=17){
                    echo "Nama: ".$data['nama'].", Umur: ".$data['umur']."<br><br>";
                }
            }
        }
        ?>
        <!-- Untuk mencari berdasarkan nama -->
        <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        foreach($siswa as $key => $terra){
            if ($nama == $terra['nama']) {
                echo "nama : $nama  <br>";
                echo "nis : ".$terra['nis'] . "<br>";
                echo "rombel : ".$terra['rombel'] . "<br>";
                echo "rayon : ".$terra['rayon'] . "<br>";
                echo "umur : ".$terra['umur'] . "<br>";
              
            
        }
    }
}
?>
</body>
</html>