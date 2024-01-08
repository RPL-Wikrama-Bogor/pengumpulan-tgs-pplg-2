<?php

class PinjamanModel {
    
    private $table = 'pinjam';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPinjaman()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getPinjamanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahPinjaman($data)
    {
        $data['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam'] . ' +2 days'));
        $data['status'] = "Belum kembali";

        $query = "INSERT INTO pinjam (nama_peminjam, jenis_barang, no_barang,tgl_pinjam, tgl_kembali) VALUES (:nama_peminjam, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)";
        $this->db->query($query);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_pinjam']);
        
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataPinjaman($data)
{  
        $lamabarang = $this->getPinjamanById($data['id']);
        $tglkembali = $lamabarang['tgl_kembali'];

        $tglKembaliBaru = new DateTime($data['tgl_kembali']);
        $tglPinjam = new DateTime($data['tgl_pinjam']);

        if ($tglKembaliBaru < $tglPinjam) {
            echo '<script>alert("Error: Tanggal kembali tidak boleh lebih awal dari tanggal pinjam.");</script>';
            return 0; 
        }

        if ($tglKembaliBaru != $tglkembali) {
            $query = "UPDATE pinjam SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali, status='Sudah Kembali' WHERE id=:id";
        } else {
            $query = "UPDATE pinjam SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali WHERE id=:id";
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


    public function deletePinjaman($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function cariPinjaman($pinjaman)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nama_peminjam LIKE :nama_peminjam");
        $this->db->bind('nama_peminjam', '%' . $pinjaman . '%');
        return $this->db->resultSet();
    }
}

    
?>