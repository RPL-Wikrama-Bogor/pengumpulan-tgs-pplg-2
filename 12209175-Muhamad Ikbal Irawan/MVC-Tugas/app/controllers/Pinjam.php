<?php

    class Pinjam extends Controller{

        public function index(){
            $data['page'] = 'Data Pinjaman';
            $data['barang'] = $this->model('JenisBarang')->getAllBarang();
            $this->view('templates/header', $data);
            $this->view('pinjam/index', $data);
            $this->view('templates/footer');
        }

        public function tambah()
        {
            $data['page'] = 'Tambah Pinjaman';
            $this->view('templates/header', $data);
            $this->view('pinjam/tambah');
            $this->view('templates/footer');
        }

        public function simpanBarang(){
            if($this->model('JenisBarang')->tambahPinjaman($_POST) > 0) {
                header('location: ' . BASE_URL . '/pinjam/index');
                exit;
            }else{
                header('location: ' . BASE_URL . '/pinjam/index');
                exit;
            }
        }
    

    public function edit($id){

        $data['page'] = 'Edit Pinjaman';
        $data['barang'] = $this->model('JenisBarang')->getBarangById($id);
        $this->view('templates/header', $data);
        $this->view('pinjam/edit', $data);
        $this->view('templates/footer');
    }

    public function updatePinjaman(){
        if($this->model('JenisBarang')->updateDataPinjaman($_POST) > 0) {
            header('location: '. BASE_URL. '/pinjam/index');
            exit;
        }else{
            header('location: '. BASE_URL. '/pinjam/index');
            exit;
        }
    }

    public function hapus($id){
        if($this->model('JenisBarang')->deletePinjaman($id) > 0) {
            header('location: '. BASE_URL. '/pinjam/index');
            exit;
        }else{
            header('location: '. BASE_URL. '/pinjam/index');
            exit;
        }
    }

    public function cari() {
        $data['page'] = 'Data Pinjaman';
        $data['barang'] = $this->model('JenisBarang')->cari($_POST);
        $this->view('templates/header', $data);
        $this->view('pinjam/index', $data);
        $this->view('templates/footer');
    }
    
}
?>