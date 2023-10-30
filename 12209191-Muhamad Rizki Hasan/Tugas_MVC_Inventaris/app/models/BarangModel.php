<?php

class BarangModel {
    private $table = 'tb_inventaris';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBarang()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBarangById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahBarang($data)
    {
        $data['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam'] . ' +2 days'));
    
        $query = "INSERT INTO tb_inventaris (nama_peminjam, jenis_barang, no_barang, tgl_pinjam, tgl_kembali) 
                VALUES(:nama_peminjam, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)";
    
        $this->db->query($query);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->execute();
    
        return $this->db->rowCount();
      }
    
    public function updateDataBarang($data)
    {
    $barangLama = $this->getBarangById($data['id']);
    $tglPinjam = strtotime($barangLama['tgl_pinjam']);
    $tglKembali = strtotime($barangLama['tgl_kembali']);

    if ($tglPinjam < $tglKembali) {
        $query = "UPDATE tb_inventaris SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali, status='Sudah Kembali' WHERE id=:id";
    } else {
        $query = "UPDATE tb_inventaris SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali WHERE id=:id";
    }

    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('nama_peminjam', $data['nama_peminjam']);
    $this->db->bind('jenis_barang', $data['jenis_barang']);
    $this->db->bind('no_barang', $data['no_barang']);
    $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
    $this->db->bind('tgl_kembali', $data['tgl_kembali']);
    $this->db->execute();

    return $this->db->rowCount();
  }

    public function deleteBarang($id)
    {
        $this->db->query("DELETE FROM " . $this->table . " WHERE id = :id");
        $this->db->bind('id', $id);
        

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataBarang()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM tb_inventaris WHERE nama_peminjam LIKE :keyword OR jenis_barang LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%' . $keyword . '%');
        return $this->db->resultSet();
    }

}