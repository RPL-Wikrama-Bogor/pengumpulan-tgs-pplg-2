<?php

    class Home extends Controller{

        public function index(){
            $data['page'] = 'Home';
            $this->view('templates/header', $data);
            $this->view('home/index');
            $this->view('templates/footer');
        }

        public function page(){
            $data['page'] = 'page';
            $data['gambar'] = 'asahi.jpg';
            $data['nama'] = 'Aldo';
            $data['pekerjaan'] = 'IT';

            $this->view('templates/header', $data);
            $this->view('home/page', $data);
            $this->view('templates/footer');
        }

    }

?>