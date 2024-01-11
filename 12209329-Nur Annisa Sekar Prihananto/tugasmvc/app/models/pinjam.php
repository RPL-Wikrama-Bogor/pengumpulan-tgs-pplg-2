<?php

class pinjam {
    private $table ='ann';
    private $db;

    public function __construct()
    {
        $this->db = new database;
        
    }

    public function getallbuku() 
    {
        $this->db->query("SELECT * FROM " . $this->table );
        return $this->db->resultSet();
    }

    public function getbukubyid($id) 
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
        
    public function tambahbuku($data)
    {
        $data['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam'] . '+2 days'));
        $data['status'] = 'Belum kembali';

        $query = "INSERT INTO ann (nama_peminjaman, jenis_berang, no_barang, tgl_pinjam, tgl_kembali, status) VALUE(:nama_peminjaman, :jenis_berang, :no_barang, :tgl_pinjam, :tgl_kembali, :status)";
        $this->db->query($query);
        $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
        $this->db->bind('jenis_berang', $data['jenis_berang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatedatabuku($data)
    {
        if($data['tgl_kembali'] != '0000-00-00 00:00:00' && $data['tgl_kembali'] > $data['tgl_pinjam'] ) {
            $data['status'] = 'sudah kembali';
        } else {
            $data['status'] = 'belum kembali';
            $data['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam'] . '+2 days'));
        }

        $query = "UPDATE ann SET nama_peminjaman=:nama_peminjaman, jenis_berang=:jenis_berang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam,tgl_kembali=:tgl_kembali, status=:status WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('nama_peminjaman', $data['nama_peminjaman']);
        $this->db->bind('jenis_berang', $data['jenis_berang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->bind('status', $data['status']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deletebuku($id)
    {
        $this->db->query('DELETE FROM ' . $this->table. ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
       
        public function caridata()
        {
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM ann WHERE nama_peminjaman LIKE :keyword OR  jenis_berang LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%" . $keyword . "%");
            return $this->db->resultSet();
        }

}