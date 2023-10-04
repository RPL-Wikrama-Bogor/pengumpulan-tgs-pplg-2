<?php

class buku extends controller {

    public function index()
    {
        $data['page'] = 'data buku';
        $data['buku'] = $this->model('pinjam')->getallbuku();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }
    
    public function tambah()
    {
        $data['page'] = 'tambah buku';
        $this->view('templates/header', $data);
        $this->view('buku/create');
        $this->view('templates/footer');
    }
    

    public function simpanbuku(){
        if( $this->model('pinjam')->tambahbuku($_POST) > 0) {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }
    }

    public function edit($id){
        $data['page'] = 'edit barang';
        $data['buku'] = $this->model('pinjam')->getbukubyid($id);
        $this->view('templates/header', $data);
        $this->view('buku/edit', $data);
        $this->view('templates/footer');
    }

    public function updatebuku(){
        if( $this->model('pinjam')->updatedatabuku($_POST) > 0) {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }
    }

    public function hapus($id){
        if( $this->model('pinjam')->deletebuku($id) > 0) {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/buku/index');
            exit;
        }
    }

    public function cari()
    {
        $data['page'] = 'data buku';
        $data['buku'] = $this->model('pinjam')->caridata();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    public function simpanBarang(){
        
        $tgl= $_POST['tgl_pinjam'];
        $tgl1= date('Y-m-d H:i:s', strtotime('+2 days', strtotime($tgl)));
        $_POST['tgl_kembali'] = $tgl1;
        $status = 'belum kembali';
        $_POST['status'] = $status;

        if ($this->model('pinjam')->tambah($_POST) > 0) {
            header('location: ' . BASE_URL . '/buku/index');
            exit;
        }else {
            header('location: ' . BASE_URL . '/buku/index');
            exit;
        }
    }
    
    
}

?>