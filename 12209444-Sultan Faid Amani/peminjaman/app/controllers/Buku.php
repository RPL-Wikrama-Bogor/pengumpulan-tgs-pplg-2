<?php

    class Buku extends Controller {

        public function index()
        {
            $data['page'] = 'Data Buku';
            $data['data'] = $this->model('DataModel')->getAllData();
            $this->view('templates/header', $data);
            $this->view('buku/index', $data);
            $this->view('templates/footer');
        }

        public function tambah()
        {
            $data['page'] = 'Tambah Buku';
            $this->view('templates/header', $data);
            $this->view('buku/create');
            $this->view('templates/footer');
        }

        public function simpanBuku(){
            if ($this->model('DataModel')->tambahData($_POST) > 0 ) {
                header('location: ' . BASE_URL . '/buku/index');
                exit;
            }else {
                header('location: ' . BASE_URL . '/buku/index');
                exit;
            }
        }

        public function edit($id){

            $data['page'] =  'Edit Buku';
            $data['data'] = $this->model('DataModel')->getDataById($id);
            $this->view('templates/header', $data);
            $this->view('buku/edit', $data);
            $this->view('templates/footer');
        }

        public function updateBuku(){
            if ($this->model('DataModel')->updateData($_POST) > 0 ) {
                header('location: ' . BASE_URL . '/buku/index');
                exit;
            }else {
                header('location: ' . BASE_URL . '/buku/index');
                exit;
            }
        }

        public function hapus($id){
            if ($this->model('DataModel')->deleteBuku($id) > 0 ) {
                header('location: ' . BASE_URL . '/buku/index');
                exit;
            }else {
                header('location: ' . BASE_URL . '/buku/index');
                exit;
            }
        }

        public function cari(){
            $data['page'] = 'Data Barang';
            $data['data'] = $this->model('DataModel')->cariBarang();
            $this->view('templates/header', $data);
            $this->view('buku/index', $data);
            $this->view('templates/footer');
        }
    }

    
?>