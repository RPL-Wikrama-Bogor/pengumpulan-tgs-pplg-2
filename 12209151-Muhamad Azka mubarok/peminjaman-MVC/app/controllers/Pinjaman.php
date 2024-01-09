<?php

class Pinjaman extends Controller {

    public function index()
    {
    $data['page'] = 'Data Pinjaman';
    $data['Pinjaman'] = $this->model ('PinjamanModel')->getAllPinjaman();
    $this->view('templates/header', $data);
    $this->view('pinjaman/index', $data);
    $this->view('templates/footer');
    }

    public function tambah()
    {
    $data['page'] = 'Tambah Pinjaman';
    $this->view('templates/header', $data);
    $this->view('pinjaman/create');
    $this->view('templates/footer');
    }

    public function simpanPinjaman(){
        
        if( $this->model('PinjamanModel')->tambahPinjaman($_POST) > 0) {
            header('location: ' . BASE_URL . '/pinjaman/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/pinjaman/index');
            exit;
        }
    }
    public function edit ($id) {

        $data['page'] = 'Edit Pinjaman';
        $data['pinjaman'] = $this->model ('PinjamanModel')->getPinjamanById($id); $this->view('templates/header', $data);
        $this->view('pinjaman/edit', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
    $data['title'] = 'Data Pinjaman';
    $data['Pinjaman'] = $this->model('PinjamanModel')->cariPinjaman($_POST['search']);
    $this->view('templates/header', $data);
    $this->view('pinjaman/index', $data);
    $this->view('templates/footer');
    }
    
    public function updatePinjaman(){
        if( $this->model('PinjamanModel')->updateDataPinjaman($_POST) > 0 ){
            header('location: '. BASE_URL . '/pinjaman/index');
        exit;
        }else{
            header('location: '. BASE_URL . '/pinjaman/index');
        exit;
        }
    }
    public function hapus($id){
        if( $this->model('PinjamanModel')->deletePinjaman($id) > 0){
            header('location: '. BASE_URL . '/pinjaman/index');
        exit;
        }else{
            header('location: '. BASE_URL . '/pinjaman/index');
        exit;
        }
    }
}
?>
