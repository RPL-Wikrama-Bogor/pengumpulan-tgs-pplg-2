<?php

class BukuModel{
    private $table ='tb_buku';
    private $db;

    public function  __construct(){
        $this->db = new Database;
    }

    public function getAllBuku(){
        $this->db->query("SELECT * FROM ".$this->table);
        return $this->db->resultSet();
    }

    public function getBukuById($id){ 
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahBuku($data){
        $query = "INSERT INTO tb_buku (nama_peminjam, jenis_barang, nomer_barang, tgl_pinjam, tgl_kembali) VALUES (:nama_peminjam, :jenis_barang, :nomer_barang, :tgl_pinjam, :tgl_kembali)";
        $this->db->query($query);
        $this->db->bind('nama_peminjam',$data['nama_peminjam']);
        $this->db->bind('jenis_barang',$data['jenis_barang']);
        $this->db->bind('nomer_barang',$data['nomer_barang']);
        $this->db->bind('tgl_pinjam',$data['tgl_pinjam']);
        $this->db->bind('tgl_kembali',$data['tgl_kembali']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataBuku($data){
        // $query ="UPDATE tb_buku SET (nama peminjam:nama peminjam, jenis barang=:jenis barang, tgl_kembali)=:tgl_kembali WHERE id=:id";
        $query ="UPDATE tb_buku SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, nomer_barang=:nomer_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_peminjam',$data['nama_peminjam']);
        $this->db->bind('jenis_barang',$data['jenis_barang']);
        $this->db->bind('nomer_barang',$data['nomer_barang']);
        $this->db->bind('tgl_pinjam',$data['tgl_pinjam']);
        $this->db->bind('tgl_kembali',$data['tgl_kembali']);
        $this->db->execute();

        return $this->db->rowCount();

    }
    public function deleteBuku($id)
    {
        $this->db->query('DELETE FROM '. $this->table . ' WHERE id=:id ');
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function cariBuku($keyword)
    {
        // ingat spasi di :nama peminjam jika salah maka jangan diskip
        $this->db->query('SELECT * FROM  tb_buku WHERE nama_peminjam LIKE :keyword OR jenis_barang LIKE :keyword');
        $this->db->bind('id','%'. $keyword .'%');
        $this->db->execute();

        return $this->db->resultSet();
    }
}

?>