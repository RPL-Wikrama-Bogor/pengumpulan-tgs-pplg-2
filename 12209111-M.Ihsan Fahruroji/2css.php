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
<html>
<head>
    <title>tes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial;
            background-color: #93B1A6;
        }

        .container {
            clear: both;
            padding: 20px;
            border: 1px solid #ccc;
            overflow: hidden;
            background-color: #CEDEBD;
        }

        .image {
            float: right;
            width: 40%;
            margin-right: 40px;
            max-width: 100%;
            height: auto;


        }

        .image img {
            max-width: 100%;
            height: auto;
        }

        .content {
            float: left;
            margin-left: 20px;
        }

        .admin-button {
            float: right;
        }

        button.administration {
            background-color: orange;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .four-columns {
            display: flex;
            justify-content: space-between;
            margin-top: 700px;
            

        }

        .column {
            flex-basis: 23%;
            padding: 10px;
            background-color: #E6F0C7;
            border: 1px solid #ccc;
        }

        .form-container {
            margin-top: 50px;
            padding: 20px;
            background-color: #E6F0C7;
            border: 1px solid #ccc;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .form-card {
            flex-basis: 48%;
            padding: 50px;
            background-color: silver;
            border: 1px solid #ccc;
            margin-bottom: 20px;
           
        }

        .form-card input,
        .form-card textarea {
            width: 80%;
            padding: 35px;
            margin-bottom: 20px;
           
            
        }

        .btn{
            background-color: orange;
            color: white;
            border: none;
            padding: 15px 25px;
            cursor: pointer;
        }


        @media (max-width: 600px) {
   
       }


      @media (min-width: 601px) and (max-width: 900px) {
    
      }

       
    </style>
</head>
<body>
    <div class="container">
        <div class="admin-button">
            <button class="administration">Administration</button>
        </div>
    </div>
    <div class="image">
        <br>
        <img src="wikrama.jpg" alt="Image">
    </div>
    <div class="content">
        <h2>SMK WIKRAMA BOGOR</h2>
        <p>SMK Wikrama Bogor adalah sebuah lembaga pendidikan menengah kejuruan yang terletak di kota Bogor, Jawa Barat, Indonesia</p>
        <p>Sebagai salah satu institusi pendidikan terkemuka di wilayah tersebut, SMK Wikrama Bogor telah membangun reputasi yang</p>
        <p>yang kuat dalam memberikan pendidikan berkualitas dan persiapan komprehensif bagi para siswa untuk memasuki dunia kerja</p>
        <p>atau melanjutkan studi ke jenjang yang lebih tinggi.</p>
    </div>
        <div class="four-columns">
            <div class="column">
                <p>jumlah siswa</p>
                <p>1.800</p>
            </div>
            <div class="column">
                <p>jumlah ruangan</p>
                <p>100+</p>
            </div>
            <div class="column">
                <p>jumlah guru</p>
                <p>50+</p>
            </div>
            <div class="column">
                <p>jumlah computer</p>
                <p>20+</p>
            </div>
        </div>
    <div class="form-container">
        <div class="form-card">
            <h3>Form Pengaduan</h3> 
            <form method="post" action="">
                <div class="form-column">
                    <input type="text" name="nama" placeholder="Nama">
                </div>
                <div class="form-column">
                    <input type="text" name="email" placeholder="Email">
                </div>
                <div class="form-column">
                    <input type="text" name="telepon" placeholder="Nomor Telepon">
                </div>
                <div class="form-column">
                    <input type="file">
                </div>
                <textarea name="deskripsi" placeholder="Deskripsi Pengaduan"></textarea>
                <p class="error-message"><?php echo $errorMessage; ?></p>
                <button class="btn" type="submit" name="submit">Submit</button>
            </form>
            <?php
            if ($isFormSubmitted) {
                echo "<script>window.location.href = '3css.php';</script>";
            }
            ?>
        </div>
    </div>
</body>
</html>
