<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

        <style>
            body{
                font-family:'Nunito Sans';
            }

            .button{
                float: right;
                background-color: antiquewhite;
                text-decoration: none;
                padding: 8px 15px;
                border-radius: 50px;
                margin-bottom: 20px;
            }
            .content{
                clear: right;
            }

            .text{
                float: left;
                width: 50%;
                margin-top: -400px;
            }
            .text h1{   
                margin-left: 50px;
                
            }
            .image{
                float:right;
                width: 700px;
                margin-top: 60px;
                /*alasan div nya hanya 50% adalah agar text dan image berada dalam baris yang sama (100%)*/
            }
            img{
                width: 550px;
                height: 350px;
                margin-left: 200px;

                /*widht tag img 100% dari width content div nya (50%)*/
            }
            .baris{
                box-sizing: border-box;
                padding: 20px;
                display: inline-block;
                margin-left: 40px;
            

            }
            .kolom{
                width: 300px;
                height: 120px;
                background-color: aquamarine;
                margin: 3px;
                box-sizing: border-box;
                padding: 10px;
                float: left;
                margin-top: 20px;
            } 
            .kolom1, .kolom2, .kolom3, .kolom4{
                text-align: center;
                
            }
            .heading{
                text-align: center;
                margin-top: 0px;
            }
            .container{
                background-color: #EEEDED;
                width: 50%;
                max-width: 100%;
                height: 600px;
                border-radius: 5px;
                margin-left: 300px;
                
            }
            .judul{
                margin-left: 25px;
            
            }
           .input{
            width: 600px;
            margin-left: 20px;
            height: 30px;
            border-radius: 10px;
            border: 0;
           }
           .box{
            justify-content: center;
            margin-left: 30px;
           }
           .button2{
            margin-left: 55px;
            margin-top: 3px;
            width: 150px;
            background-color: #B9B4C7;

           }
           .file{
            margin-left: 25px;
            margin-top: 10px;
           }

           @media (max-width: 600px) {

            body{
                padding: 0;
                
            }
            .button{
                margin-right: 20px;
                
            }
            .text{
                text-align: center;
                margin-top: 30px;
                margin-left: 70px;
            }
            .image{
                width: 50px;
                margin-right: 470px;
            }
            img{
                width: 250px;
                height: 150px;
                
            }
            .container{
                margin-left: 37px;
                width: 300px;

            }
            .input{
                width: 200px;
            }
            .baris{
                margin-left: 15px;
            }

           }

        </style>
    
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200&display=swap" rel="stylesheet">

</head>
<body>
    <a href="" class="button">Administrator</a>
    
    <div class="image">
        <img src="WhatsApp Image 2023-07-31 at 20.36.42.jpg" alt="">
    </div>
    </div>
    <div class="content">
        <div class="text">
            <h1>Kelas Gaduh</h1>
        <ul>
            <li>
            Arrived compass prepare an on as. Reasonable particular on my it in sympathize. Size now easy eat hand how. Unwilling he departure elsewhere dejection at. Heart large seems may purse means few blind. Exquisite newspaper attending on certainty oh suspicion of. He less do quit evil is. Add matter family active mutual put wishes happen.
            </li>
            <li>
            Arrived compass prepare an on as. Reasonable particular on my it in sympathize. Size now easy eat hand how. Unwilling he departure elsewhere dejection at. Heart large seems may purse means few blind. Exquisite newspaper attending on certainty oh suspicion of. He less do quit evil is. Add matter family active mutual put wishes happen.
            </li>
            <li>
            Arrived compass prepare an on as. Reasonable particular on my it in sympathize. Size now easy eat hand how. Unwilling he departure elsewhere dejection at. Heart large seems may purse means few blind. Exquisite newspaper attending on certainty oh suspicion of. He less do quit evil is. Add matter family active mutual put wishes happen.
            </li>
        </ul>
                </div>
                

            <section class="baris">
	   <div class="kolom kolom1"><b>Kegaduhan dalam kelas</b><br><br><br>Selalu</div>
	   <div class="kolom kolom2"><b>Anak Baperan</b><br><br><br>Selalu</div>
	   <div class="kolom kolom3"><b>Ganggu Sholat</b><br><br><br>Selalu</div>
	   <div class="kolom kolom4"><b>Tidak Amanah</b><br><br><br>Selalu</div>
  </section>
  
   <div class="container">
    <form action="" method="post">
        <h3 class="heading"><br>Report Siswa</h3>
        <div class="box">
        <label class="judul" for="nik">Nis : </label>
        <br>
        <input class ="input" type="number" name="nama">
        <br><br>
        <label class="judul" for="nik">Nama : </label>
        <br>
        <input class ="input" type="text" name="nama">
        <br><br>
        <label class="judul" for="nik">Rayon : </label>
        <br>
        <input class ="input" type="text" name="nama">
        <br><br>
        <label class="input" for="nik">Perilaku Negatif : </label>
        <br>
        <input class ="input" type="text" name="nama" style="height:200px">
        <input type="file" class="file">
    </div>
    <button class="button2" type="submit">Laporkan</button>
           
   </div>
  </form>
<br><br>
</body>
</html>