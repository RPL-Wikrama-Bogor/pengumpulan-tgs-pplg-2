<?php

class home extends Controller{
    // public function index()
    // {
    //     $data['nama'] = 'ihsan';
    //     $data['pekerjaan'] = 'pelajar';
    //     $data['judul'] = 'Home';
    //     $this->view('templates/header', $data);
    //     $this->view('home/index', $data);
    //     $this->view('templates/footer');
    // }

    // public function page()
    // {
    //     $data['judul']= 'page';
    //     $this->view('templates/header', $data);
    //     $this->view('home/page' );
    //     $this->view('templates/footer');
    // }
 public function index()
 {
    $data['judul'] = 'Home';
    $this->view('templates/header', $data);
    $this->view('home/index');
    $this->view('templates/footer');
 }

 public function page()
 {
    $data['judul'] ='page';
    $data['gambar'] = 'asahi.jpg';
    $data['nama'] = 'Ihsan';
    $data['pekerjaan'] = 'IT';
    $this->view('templates/header', $data);
    $this->view('home/page', $data);
    $this->view('templates/footer');
 }
}