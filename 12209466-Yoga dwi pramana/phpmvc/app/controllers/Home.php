<?php

    class Home extends Controller {
        public function index()
        {
            $data['page'] = 'Home';
            $this->view('templates/header', $data);
            $this->view('home/index');
            $this->view('templates/footer');
        }
        
        // public function page()
        // {
        //     $data['page'] = 'Page';
        //     $data['nama'] = 'asahi';
        //     $data['gambar'] = 'asahi.jpg';
        //     $data['pekerjaan'] = 'Idol (Treasure)';
        //     $this->view('templates/header', $data);
        //     $this->view('home/page', $data);
        //     $this->view('templates/footer');
        // }
    }
// class Home {
//     public function index($nama = 'jojo', $pekerjaan = 'Pelajar')
//     {
//         echo "Halo, nama saya $nama dan saya merupakan seorang $pekerjaan";
//     }
// }