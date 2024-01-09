<?php

class barangmodel {

    private $table = 'tb_barang';
    private $db;

    public function __construct()
    {
        $this->db = new database;
    }

    public function getallbarang()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultset();
    }

    public function getbarangbyid($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahbarang($data)
    {
        $data['tanggal_kembali'] = date('Y-m-d H:i:s', strtotime($data['tanggal_pinjam'] . ' +2 days'));
        $data['status'] = 'Belum Kembali';

        $query = "INSERT INTO tb_barang (nama_peminjam, jenis_barang, no_barang, tanggal_pinjam, tanggal_kembali, status) VALUES(:nama_peminjam, :jenis_barang, :no_barang, :tanggal_pinjam, :tanggal_kembali, :status)";

        $this->db->query($query);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tanggal_pinjam', $data['tanggal_pinjam']);
        $this->db->bind('tanggal_kembali', $data['tanggal_kembali']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatebarang($data)
    {  
        if($data['tanggal_kembali'] != '0000-00-00 00:00:00' && $data['tanggal_kembali'] > $data['tanggal_pinjam'] ) {
            $data['status'] = 'sudah kembali';
        } else {
            $data['status'] = 'belum kembali';
            $data['tanggal_kembali'] = date('Y-m-d H:i:s', strtotime($data['tanggal_pinjam'] . '+2 days'));
        }
    
        $query = "UPDATE tb_barang SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tanggal_pinjam=:tanggal_pinjam, tanggal_kembali=:tanggal_kembali, status=:status WHERE id=:id";
  
      $this->db->query($query);
      $this->db->bind('id', $data['id']);
      $this->db->bind('nama_peminjam', $data['nama_peminjam']);
      $this->db->bind('jenis_barang', $data['jenis_barang']);
      $this->db->bind('no_barang', $data['no_barang']);
      $this->db->bind('tanggal_pinjam', $data['tanggal_pinjam']);
      $this->db->bind('tanggal_kembali', $data['tanggal_kembali']);
      $this->db->bind('status', $data['status']);
      $this->db->execute();
  
      return $this->db->rowCount();
    }  

    public function deletebarang($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function caribarang($barang)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama_peminjam LIKE :barang OR jenis_barang LIKE :barang');
        $this->db->bind('barang', '%' . $barang . '%');
        return $this->db->resultSet();
    }
}
?>