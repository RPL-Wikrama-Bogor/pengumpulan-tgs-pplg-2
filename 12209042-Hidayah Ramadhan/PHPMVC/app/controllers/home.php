<?php

class Home extends Controller {
    public function index()
    {
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        $data['judul'] = 'Page';
        $data['gambar'] = 'sasuke.jpg';
        $data['nama'] = 'Sasuke';
        $data['pekerjaan'] = 'Balapan (Onta)';
        $this->view('templates/header', $data);
        $this->view('home/page', $data);
        $this->view('templates/footer');
    }
}