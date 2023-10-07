<?php

class barang extends controller {

    public function index()
    {
        $data['page'] = 'Data Barang';
        $data['barang'] = $this->model('barangmodel')->getallbarang();
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['page'] = 'Tambah Barang';
        
        $data['nama_peminjam_value'] = isset($_POST['nama_peminjam']) ? $_POST['nama_peminjam'] : '';
        $data['jenis_barang_value'] = isset($_POST['jenis_barang']) ? $_POST['jenis_barang'] : '';
        $data['no_barang_value'] = isset($_POST['no_barang']) ? $_POST['no_barang'] : '';
        $data['tanggal_pinjam_value'] = isset($_POST['tanggal_pinjam']) ? $_POST['tanggal_pinjam'] : '';
        $this->view('templates/header', $data);
        $this->view('barang/tambah', $data);
        $this->view('templates/footer');
    }

    public function simpanbarang()
    {
        if (empty($_POST['nama_peminjam']) || empty($_POST['jenis_barang']) || empty($_POST['no_barang']) || empty($_POST['tanggal_pinjam'])) {
        $msg = "Silahkan isi";

        if (empty($_POST['nama_peminjam'])) {
            $msg .= " Nama";
        }
        if (empty($_POST['jenis_barang'])) {
            $msg .= " Jenis";
        }
        if (empty($_POST['no_barang'])) {
            $msg .= " No barang";
        }
        if (empty($_POST['tanggal_pinjam'])) {
            $msg .= " Tanggal Peminjam";
        }

        echo "<script>alert('$msg');</script>";
        $this->tambah($msg);
        return;
        } else {

        if ($this->model('barangmodel')->tambahBarang($_POST) > 0) {
            header('Location: ' . BASE_URL . '/barang/index');
            exit;
        } else {
            header('Location: ' . BASE_URL . '/barang/index');
            exit;
        }
        }
    }

    public function edit($id){

        $data['page'] = 'Edit Barang';
        $data['barang'] = $this->model('barangmodel')->getbarangbyid($id);
        $this->view('templates/header', $data);
        $this->view('barang/edit', $data);
        $this->view('templates/footer');
    }

    public function updatebarang(){
        if( $this->model('barangmodel')->updatebarang($_POST) > 0 ) {
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }
    }

    public function hapus($id){
        if( $this->model('barangmodel')->deletebarang($id) > 0 ){
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }else{
            header('location: '. BASE_URL . '/barang/index');
            exit;
        }
    }

}