<?php
$isFormSubmitted = false;
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $telepon = $_POST["telepon"];
    $deskripsi = $_POST["deskripsi"];

    if (empty($nama) || empty($email) || empty($telepon) || empty($deskripsi)) {
        $errorMessage = "Isi semua form terlebih dahulu.";
    } else {
        
        $isFormSubmitted = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Document</title>
    <style>
        body {
            background-color: rgba(214, 20, 214, 0.263);
        }
        .content{
            clear: right;
        }
        .button {
            float: right;
            background-color: rgb(84, 84, 84);
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 50px;
        }
        .text {
            float: left;
            width: 50%;
        }
        .image{
            float: right;
            width: 50%;
        
        }
        img {
            width: 100%;
            border-radius: 10px;
            height: 390px;
           
        }
        .kotak {
            box-sizing: border-box;
			padding: 20px;
            display: inline-block;
            margin-left: -20px;

        }
        .kolom {
        width: 300px;
        height: 100px;
        background-color: rgb(169, 32, 32);
        margin: 3px;
        box-sizing: border-box;
		padding: 10px;
        float: left;
        }
        .kotak1,.kotak2,.kotak3,.kotak4{
            text-align: center;
            }

        b {
            margin-left: 10rem;
        }
        input[type="text"]{
            width: 500px;
        }

        .pengaduan{
            height: 250px;
        }
    
        .formulir {
            background-color:rgb(63, 96, 6);
            width: 510px;
            height: 520px;
            border-radius: 10px;
            padding: 10px;
            margin-top: -40px;
        }

        input[type="submit"]{
            margin-left: 90%;
        }
        @media (max-width: 600px) {
   
}


@media (min-width: 601px) and (max-width: 900px) {

}
    </style>
</head>
<body>
    <a href="" class="button">Administrasi</a><br><br><br>
    <div class="content">
        <div class="text">
            <h1>Selamat Datang </h1>
            <ol>
                
                  <li> Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque debitis ducimus qui amet.</li>
                    <li>Libero quo maiores nam maxime quos, dolores alias, minus ducimus velit voluptatibus consectetur</li>
                   <li> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab consequuntur neque voluptas doloremque vel tempore nobis ducimus quis modi provident officia.</li>
                </li>
            </ol>
        </div>
        <div class="image">
            <img src="smk wikrama.jpg" alt=""/>
        </div>
    </div>

    <div class="kotak">
        <div class="kolom kotak1">Jumlah Kecamatan<br>15</div>
        <div class="kolom kotak2">Jumlah Desa<br>42</div>
        <div class="kolom kotak3">Jumlah Penduduk<br>12.000</div>
        <div class="kolom kotak4">Data Per Tahun<br>2023</div>
    </div>

    <h3><center>Laporan Pengaduan</center></h3>

    <div class="formulir">
        <b>Buat Pengaduan</b><br>
        <label for="nik">NIK :</label><br>
        <input type="text" name="nik" id="nik">
      
      

        <br>
        <label for="nama_lengkap">Nama Lengkap :</label><br>
        <input type="text" name="nama_lengkap" id="nama_lengkap">
      
        <br>
        <br>
        <label for="no_telp">No Telp :</label><br>
        <input type="text" name="no_telp" id="no_telp">
        <br>

        <br>
        <label for="pengaduan">Pengaduan :</label><br>
        <input type="text" class="pengaduan" name="pengaduan" id="pengaduan">
        <br>

        <label for="file">Upload Gambar Terkait</label>
        <br>
        <input type="file">

       <a class="input" href="hasil.php">submit</a>
    </div>
</body>
</html>