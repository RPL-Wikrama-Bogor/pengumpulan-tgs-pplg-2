<!DOCTYPE html>
<html>
<head>
    <title>Daftar Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 400px;
        }
        h1 {
            color: #333;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Siswa</h1>
        <a href="?cari_umur">Cari yang sudah berusia lebih dari 17 tahun</a><br>
        <form method="GET">
            <label for="cari_nama">Cari berdasarkan nama (penggunaan kapital diawal nama):</label>
            <input type="text" name="cari_nama" id="cari_nama">
            <input type="submit" value="Cari">
        </form>

        <?php
        $siswa = [
            [
                "nama" => "Fema",
                "nis" => 11907154,
                "rombel" => "PPLG XI-2",
                "rayon" => "Cicurug 3",
                "umur" => 18,
            ],
            [
                "nama" => "Putri",
                "nis" => 11907155,
                "rombel" => "PPLG XI-2",
                "rayon" => "Ciawi 1",
                "umur" => 16,
            ],
            [
                "nama" => "Putra",
                "nis" => 11907156,
                "rombel" => "PPLG XI-4",
                "rayon" => "Sukasari 2",
                "umur" => 17,
            ],
            [
                "nama" => "Arta",
                "nis" => 11907157,
                "rombel" => "PPLG XI-4",
                "rayon" => "Wikrama 4",
                "umur" => 17,
            ],
        ];

        if (isset($_GET['cari_umur'])) {
            echo "<h2>Daftar siswa yang sudah berusia 17 tahun atau lebih:</h2>";
            echo "<ul>";
            foreach ($siswa as $data) {
                if ($data['umur'] >= 17) {
                    echo "<li>Nama: " . $data['nama'] . ", Umur: " . $data['umur'] . "</li>";
                }
            }
            echo "</ul>";
        }

        if (isset($_GET['cari_nama'])) {
            $namaCari = $_GET['cari_nama'];
            $siswaDitemukan = false;

            foreach ($siswa as $data) {
                if ($data['nama'] == $namaCari) {
                    echo "<h2>Informasi Siswa</h2>";
                    echo "Nama: " . $data['nama'] . "<br>";
                    echo "NIS: " . $data['nis'] . "<br>";
                    echo "Rombel: " . $data['rombel'] . "<br>";
                    echo "Rayon: " . $data['rayon'] . "<br>";
                    echo "Umur: " . $data['umur'] . "<br>";
                    $siswaDitemukan = true;
                    break;
                }
            }

            if (!$siswaDitemukan) {
                echo "<p>Siswa dengan nama '$namaCari' tidak ditemukan.</p>";
            }
        }
        ?>
    </div>
</body>
</html>

