<?php

class AlatModel{
    private $table ='tb_alat';
    private $db;

    public function  __construct(){
        $this->db = new Database;
    }

    public function getAllAlat(){
        $this->db->query("SELECT * FROM ".$this->table);
        return $this->db->resultSet();
    }

    public function getAlatById($id){ 
        $this->db->query('SELECT * FROM '. $this->table .' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahAlat($data){
        $data['tgl_kembali'] = date("Y-m-d H:i:s",strtotime($data['tgl_pinjam'].'+2days'));
        $query = "INSERT INTO tb_alat (nama_peminjam, jenis_barang, no_barang, tgl_pinjam, tgl_kembali) VALUES (:nama_peminjam, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)";
        $this->db->query($query);
        $this->db->bind('nama_peminjam',$data['nama_peminjam']);
        $this->db->bind('jenis_barang',$data['jenis_barang']);
        $this->db->bind('no_barang',$data['no_barang']);
        $this->db->bind('tgl_pinjam',$data['tgl_pinjam']);
        $this->db->bind('tgl_kembali',$data['tgl_kembali']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataAlat($data){
        $data['tgl_kembali'] = date("Y-m-d H:i:s",strtotime($data['tgl_kembali']));
        $data['tgl_pinjam'] = date("Y-m-d H:i:s",strtotime($data['tgl_pinjam']));

        $query ="UPDATE tb_alat SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_peminjam',$data['nama_peminjam']);
        $this->db->bind('jenis_barang',$data['jenis_barang']);
        $this->db->bind('no_barang',$data['no_barang']);
        $this->db->bind('tgl_pinjam',$data['tgl_pinjam']);
        $this->db->bind('tgl_kembali',$data['tgl_kembali']);
        $this->db->execute();
        return $this->db->rowCount();

    }
    public function deleteAlat($id)
    {
        $this->db->query('DELETE FROM '. $this->table . ' WHERE id=:id ');
        $this->db->bind('id',$id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function cariAlat($alat)
    {
        // ingat spasi di :nama_peminjam jika salah maka jangan diskip
        $this->db->query('SELECT * FROM  tb_alat WHERE nama_peminjam LIKE :alat OR jenis_barang LIKE :alat OR no_barang LIKE :alat OR tgl_pinjam LIKE :alat OR tgl_kembali LIKE :alat');
        $this->db->bind('alat','%'. $alat .'%');
        return $this->db->resultSet();
    }
    public function tanggalLewat($data){
        return strtotime($data['tgl_kembali']) >= strtotime($data['tgl_pinjam']);
    }
}

?>