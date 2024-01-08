<?php

class barang extends Controller {

    public function index()
    {
        $data['page'] = 'Data Barang';
        $data['barang'] = $this->model('PinjamanModel')->getAllBarang();
        $this->view('templates/header', $data);
        $this->view('barang/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['page'] = 'Tambah Barang';
        $this->view('templates/header', $data);
        $this->view('barang/create');
        $this->view('templates/footer');
    }

    public function simpanBarang (){
        if($this->model('PinjamanModel')->tambahPinjaman($_POST) > 0) {
            header('location: '. BASE_URL . 'barang/index');
            exit;
        // } else {
        //     header('location: '. BASE_URL . '/barang/index');
        //     exit;
        // }
    }
}

    public function edit($id){

        $data['page'] = 'Edit Barang';
        // if (isset($_POST['submit'])) {
        //     $tglPinjam = strtotime($data['barang'] ['tgl_pinjam']);
        //     $tglKembali = strtotime($data['barang'] ['tgl_pinjam']);

        //     if($tglKembali < $tglPinjam) {
        //         $data['error'] = 'Tanggal kembali harus lebih besar dari tanggal pinjam';
        //     }
        // }

        $data['barang'] = $this->model('PinjamanModel')->getBarangById($id);
        $this->view('templates/header', $data);
        $this->view('barang/edit', $data);
        $this->view('templates/footer');
    }

    public function updateData(){
        if($this->model('PinjamanModel')->updateDataPinjaman($_POST) > 0) {
            header('Location: '. BASE_URL . 'barang/index');
            exit;
        } else {
            header('location: '. BASE_URL . 'barang/index');
            exit;
        }
    }
    
    public function hapus($id){ 
        if($this->model('PinjamanModel')->deletePinjaman($id) > 0) {
            header('Location: '. BASE_URL . 'barang/index');
            exit;
        } else {
            header('location: '. BASE_URL . 'barang/index');
            exit;
        }
    }

  public function cari()
  {
    $data['page'] = 'Data barang';
    $data['barang'] = $this->model('PinjamanModel')->cariDataBarang();
    $this->view('templates/header', $data);
    $this->view('barang/index', $data);
    $this->view('templates/footer');
  }
}
?>  