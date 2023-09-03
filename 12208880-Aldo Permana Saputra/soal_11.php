<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
     <title>Document</title>

     <style>
          body {

               margin: 0;
               height: 100vh;
               background-color: rgb(19, 60, 66);
               font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
               overflow: hidden;
               display: grid;
               place-items: center;
               height: 100vh;

          }


          .card {
               /* display: flex; */
               border-radius: 30px;
               background-color: white;
               overflow: hidden;
               height: 650px;
               width: 800px;
               box-shadow: 7px 8 30px rgb(0, 255, 247);
               max-width: clamp(620px, 70vw, 820px);
               min-width: 300px;
               min-height: 280px;
          }

          .center h3 {

               display: flex;
               justify-content: center;
               align-items: center;

          }

          .center label {
               display: flex;
               justify-content: center;
               align-items: center;
          }

          .input {

               display: flex;
               justify-content: center;
               align-items: center;
               padding: 10px 100px;

          }

          /* .submit {

               display: flex;
               justify-content: center;
               align-items: center;
          } */

          .bg-submit {

               background-color: rgb(140, 255, 217);
               border: none;
               padding: 5px 13px;
               border-radius: 30px;
               font-weight: bold;
               position: absolute;
               justify-content: center;
               display: flex;
               margin-left: 15px;
               margin-top: -4px;
               box-shadow: 5px 5px 8px rgba(0, 0, 0, 0.25);


          }

          .typing {
               margin-top: 15px;
               position: relative;
               height: 23px;
               width: 50%;
               border: none;
               padding: 10px 20px;
               border-radius: 30px;
               box-shadow: 5px 5px 8px rgba(0, 0, 0, 0.25);

               /* box-shadow: 5px 5px 7px rgba(0, 0, 0, 0.25),
                    inset 2px 2px 5px rgba(0, 0, 0, 0.5),
                    inset -3px -3px 5px rgba(0, 0, 0, 0.5); */
          }


          .output{

               /* position: absolute; */
               justify-content: center;
               display: flex;
               text-align: center;
               box-shadow: 25px 5px 25px rgb(12, 218, 211);
               margin-top: 50px;
               border-radius: 50px;

          }


     </style>

</head>

<body>

     <form action="" method="post">


          <div class="card">
               <div class="isi">

                    <div class="center">
                         <h3>Inputkan no pegawai</h3>
                    </div>


                    <div class="input">

                         <label for="no_pegawai"></label>
                         <input class="typing" type="number" placeholder="Tuliskan disini.." name="no_pegawai" id="no_pegawai">

                         <div class="submit">

                              <label for="submit"> </label>
                              <input class="bg-submit" type="submit" name="submit" id="submit">

                         </div>

                    </div>




               </div>

               <div class="output">
                    <?php

                    $no_pegawai;
                    $no_urutan;
                    $no_golongan;

                    $tanggal;
                    $tanggal_lahir;
                    $bulan;
                    $tahun;


                    if (isset($_POST['submit'])) {
                         $no_pegawai = $_POST['no_pegawai'];



                         if ($no_pegawai < 11) {
                              echo "No pegawai tidak sesuai";
                         } else {
                              $no_golongan = substr($no_pegawai, 0, 1);
                              $tanggal = substr($no_pegawai, 1, 2);
                              $bulan = substr($no_pegawai, 3, 2);
                              $tahun = substr($no_pegawai, 5, 4);
                              $no_urutan = substr($no_pegawai, 9, 2);
                         }
                         if ($bulan == "01") {
                              $bulan = "Januari";
                         } elseif ($bulan == "02") {
                              $bulan = "Februari";
                         } elseif ($bulan == "03") {
                              $bulan = "Maret";
                         } elseif ($bulan == "04") {
                              $bulan = "April";
                         } elseif ($bulan == "05") {
                              $bulan = "Mei";
                         } elseif ($bulan == "06") {
                              $bulan = "Juni";
                         } elseif ($bulan == "07") {
                              $bulan = "Juli";
                         } elseif ($bulan == "08") {
                              $bulan = "Agustus";
                         } elseif ($bulan == "09") {
                              $bulan = "September";
                         } elseif ($bulan == "10") {
                              $bulan = "Oktober";
                         } elseif ($bulan == "11") {
                              $bulan = "November";
                         } else {
                              $bulan = "Desember";
                         }


                         $tanggal_lahir = $tanggal . "-" . $bulan . "-" . $tahun;


                         echo " Nomer golongan : " . $no_golongan;
                         echo "</br>";
                         echo " Tanggal lahir : " . $tanggal_lahir;
                         echo "</br>";
                         echo " Nomer urutan : " . $no_urutan;
                    }


                    ?>
               </div>

          </div>




     </form>




</body>

</html>