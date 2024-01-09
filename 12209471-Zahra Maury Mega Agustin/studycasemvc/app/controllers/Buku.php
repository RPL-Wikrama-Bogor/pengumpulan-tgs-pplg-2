<?php 

class Buku extends Controller {
    public function index() 
    {
        $data['page'] = 'Data Buku';
        $data['buku'] = $this->model('BukuModel')->getAllBuku();
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

    public function simpanBuku() 
    {
        $tgl = $_POST['tgl_pinjam'];
        $tgl1 = date('Y-m-d H:i:s', strtotime('+2 days', strtotime($tgl)));
        $_POST['tgl_kembali'] = $tgl1;
        $status = 'belum kembali';
        $_POST['status'] = $status;


        if ($this->model('BukuModel')->tambahBuku($_POST) > 0) {
            header('location: ' . BASE_URL . '/buku/index');
            exit;
        }else {
            header('location: ' . BASE_URL . '/buku/index');
            exit;
    } }

    public function edit($id) {

        $data['page'] = 'Edit Buku';
        $data['buku'] = $this->model('BukuModel')->getBukuById($id);
        $this->view('templates/header', $data);
        $this->view('buku/edit', $data);
        $this->view('templates/footer');
    }

    public function updateBuku() 
    {
        $status = 'sudah kembali';
        $_POST['status'] = $status;
        if ( $this->model('BukuModel')->updateDataBuku($_POST) > 0) {
            header('location: '. BASE_URL . '/buku/index');
            exit;
        } else {
            header('location:'. BASE_URL . '/buku/index');
            exit;
        }
    }

    public function hapus($id) {
        if ($this->model('BukuModel')->deleteBuku($id) > 0) {
            header ('location: '. BASE_URL . '/buku/index');
            exit;
        } else {
            header('location:'. BASE_URL . '/buku/index');
            exit;
        }
    }

    public function cari()
    {
        $data['page'] = 'Data Buku';
        $data['buku'] = $this->model('BukuModel')->cariBuku($_POST['search']);
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }
    
}
?>