<?php

class JenisBarang{

    private $table = 'tb_peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllBarang()
    {
        $this->db->query("SELECT * FROM ".$this->table);
        return $this->db->resultSet();
    }

    public function getBarangById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahPinjaman($data)
    {
        $data['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam'] . ' + 2 days'));
        $data['status'] = 'Belum Kembali';
        $query = "INSERT INTO tb_peminjaman (nama_peminjaman, jenis_barang, no_barang, tgl_pinjam, tgl_kembali, status) VALUES (:nama_peminjaman, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali, :status)";
        $this->db->query($query);
        $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();
        
        return $this->db->rowCount();
    }
    
    
    public function updateDataPinjaman($data)
    {
        
        if (isset($data['tgl_kembali']) AND $data['tgl_kembali'] > $data['tgl_pinjam']) {
            $data['status'] = 'Sudah Kembali';
        }else{
            $data['status'] = 'Belum Kembali';
        }

        $query = "UPDATE tb_peminjaman SET nama_peminjaman=:nama_peminjaman, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, status=:status WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletePinjaman($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cari() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tb_peminjaman WHERE nama_peminjaman LIKE :keyword OR jenis_barang LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }

}

?>