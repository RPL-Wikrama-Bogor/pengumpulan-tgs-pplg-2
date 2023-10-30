<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Siswa</title>
    <style>
        input {
            width: 200px;
        }
    </style>
</head>
<body>
    <?php
    $names = [
        [
            "nama" => "Yazid",
            "nis" => 12209281,
            "rombel" => "PPLG XI-2",
            "rayon" => "Cisarua 6",
            "umur" => "16",
        ],
        [
            "nama" => "Wiliadi",
            "nis" => 1220928198,
            "rombel" => "PPLG XI-12",
            "rayon" => "Cisarua 19",
            "umur" => "20",
        ],
        [
            "nama" => "Radja",
            "nis" => 1220928123,
            "rombel" => "PPLG XI-81",
            "rayon" => "Cisarua 21",
            "umur" => "18",
        ],
        [
            "nama" => "Darel",
            "nis" => 1220928143,
            "rombel" => "PPLG XI-23",
            "rayon" => "Cisarua 90",
            "umur" => "19",
        ],
    ];
    ?>

<form action="" method="post">
        <a href="?cari">Cari yang sudah berusia 17 tahun atau lebih</a>
        <div>
            <label for="nama">Cari berdasarkan nama :</label>
            <input placeholder="Ketik Nama yang akan Anda cari" autocomplete="off" type="text" name="nama" id="nama">
            <button type="submit" name="submit">Cari Nama</button>
        </div>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        foreach ($names as $data_siswa) {
            //untuk mencari indeks (posisi) pertama kali kemunculan suatu substring dalam sebuah string . 
            //Substring adalah sebagian dari sebuah string yang merupakan urutan karakter yang lebih pendek yang terdapat dalam string yang lebih panjang. 
            if (stripos(strtolower($data_siswa["nama"]), $nama) !== false) {
                echo "<h2>Informasi Siswa</h2>";
                echo "Nama: $data_siswa[nama]<br>";
                echo "NIS: $data_siswa[nis]<br>";
                echo "Rombel: $data_siswa[rombel]<br>";
                echo "Rayon: $data_siswa[rayon]<br>";
                echo "Umur: $data_siswa[umur]<br>";
            }
        }
    }
    ?>


    <ul>
        <?php
          if (isset($_GET['cari'])) {
          foreach ($names as $name) {
              if($name ['umur'] >= 17) {
                  echo "<ul><li> $name[nama] | $name[umur]</li></ul>";
              }
          }
      }      
        ?>
    </ul>
</body>
</html>