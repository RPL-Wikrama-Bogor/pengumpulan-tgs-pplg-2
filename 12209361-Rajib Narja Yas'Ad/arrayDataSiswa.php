    <?php 

        $siswa = [
            [
                "nama" => "rajib",
                "nis" => 12209361,
                "rombel" => "PPLG XI-2",
                "rayon" => "wikrama 2",
                "umur" => 16 ],
            [
                "nama" => "goblin",
                "nis" => 12209362,
                "rombel" => "PPLG XI-5",
                "rayon" => "padepokan tuyul 1",
                "umur" => 1 ],
            [
                "nama" => "yasad",
                "nis" => 12209363,
                "rombel" => "PPLG XI-6",
                "rayon" => "cianjur 1",
                "umur" => 17 ],
            [
                "nama" => "bagong",
                "nis" => 12209364,
                "rombel" => "PPLG XI-4",
                "rayon" => "bali 3",
                "umur" => 20 ],
            [
                "nama" => "bangsul",
                "nis" => 12209365,
                "rombel" => "PPLG XI-1",
                "rayon" => "bekasi 2",
                "umur" => 30 ]
        ]


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>nyari anak hilang</title>

        <style>

        </style>
    </head>
    <body>
        <div class="card">
            <div class="opsi">
                <h3>opsi 1 : jika dipencet akan muncul anak berusia >= 17</h2>
                <h3>opsi 2 : menampilkan data siswa yang dicari</h2>
            </div>
            <div class=inputan>
                <form action="" method="post">
                <ul>
                    <li>
                        <div class="button">
                            <a href="?tagPenghubung">tampilkan usia >=17</a>
                    </li>
                    <li>
                        <p>cari berdasarkan nama :
                        <input type="text" name="inputNama">
                        <input type="submit" name="button">
                        </p>
                    </li>
                </ul>
                </form>
            </div>
        </div>
        <div class="hasil">
            <?php 
        // cari umur
                if(isset($_GET['tagPenghubung'])) { 
                    foreach ($siswa as $hasil1)
         { if ($hasil1['umur'] >= 17) {
            echo "<p>" . $hasil1['nama'] . $hasil1['umur'] . "</p>";
          } 
         }
         // cari nama
         if (isset($_POST['button'])) { 
            $hasilCariNama = $_POST['inputNama'];
            foreach ($siswa as $hasil2) {
                if (strtolower($hasil2['nama']) == strtolower($hasilCariNama)) {
                    echo "<p>" . $hasil2['nama'] . " (" . $hasil2['umur'] . " tahun)</p>";
                }
            }}}
         ?>
        </div>    
    </body>
    </html>
