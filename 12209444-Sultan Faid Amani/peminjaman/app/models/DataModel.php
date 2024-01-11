<?php

    class DataModel {
        private $table = 'peminjaman';
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getAllData()
        {
            $this->db->query("SELECT * FROM " . $this->table);
            return $this->db->resultSet();
        }

        public function getDataById($id)
        {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id',$id);
            return $this->db->single();
        }

        public function tambahData($data)
        {
            $data['tgl_kembali'] = date('Y-m-d H:i:s',strtotime(' + 2 day', strtotime($data['tgl_pinjam'])));
            $query = "INSERT INTO peminjaman (nama_peminjam, jenis_barang, no_barang, tgl_pinjam, tgl_kembali) VALUES (:nama_peminjam, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)";
            $this->db->query($query);
            $this->db->bind('nama_peminjam', $data['nama_peminjam']);
            $this->db->bind('jenis_barang', $data['jenis_barang']);
            $this->db->bind('no_barang', $data['no_barang']);
            $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
            $this->db->bind('tgl_kembali', $data['tgl_kembali']);
            $this->db->execute();

            return $this->db->rowCount();
        }

        public function updateData($data)
        {
            $barangLama = $this->getDataById($data['id']);
            $tglPinjam = strtotime($barangLama['tgl_pinjam']);
            $tglKembali =strtotime($barangLama['tgl_kembali']);

            if ($tglPinjam < $tglKembali) {
                $query="UPDATE peminjaman SET jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, status='Sudah Kembali' WHERE id=:id";
            }

            else {
                $query="UPDATE peminjaman SET jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam WHERE id=:id";
            }
        // Check if the 'nama_peminjam' key exists in the $data array
            $this->db->query($query);
            $this->db->bind('id', $data['id']);
            $this->db->bind('jenis_barang', $data['jenis_barang']);
            $this->db->bind('no_barang', $data['no_barang']);
            $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
            $this->db->execute();

            return $this->db->rowCount();
        }

        public function deleteBuku($id)
        {
            $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id',$id);
            $this->db->execute();
            
            return $this->db->rowCount();
        }

        public function cariDataBarang()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM peminjaman WHERE nama_peminjam LIKE :keyword OR jenis_barang LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
        public function cariBarang()
        {
            $keyword = $_POST['keyword'];
            $this->db->query("SELECT * FROM peminjaman WHERE nama_peminjam LIKE :keyword OR jenis_barang LIKE :keyword");
            $this->db->bind('keyword','%' . $keyword . '%');
            return $this->db->resultSet();
        }

        
    }

?>