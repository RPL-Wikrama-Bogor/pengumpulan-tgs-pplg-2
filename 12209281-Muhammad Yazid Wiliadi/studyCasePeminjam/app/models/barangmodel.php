<?php
class barangmodel {

    private $table = 'tb_inventaris';
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
        $data['tgl_kembali'] = date('Y-m-d H:i:s', strtotime($data['tgl_pinjam'] . ' +2 days'));
        $data['status'] = "belum kembali";

        $query = "INSERT INTO tb_inventaris (nama_peminjam, jenis_barang, no_barang, tgl_pinjam, tgl_kembali) VALUES(:nama_peminjam, :jenis_barang, :no_barang, :tgl_pinjam, :tgl_kembali)";

        $this->db->query($query);
        $this->db->bind('nama_peminjam', $data['nama_peminjam']);
        $this->db->bind('jenis_barang', $data['jenis_barang']);
        $this->db->bind('no_barang', $data['no_barang']);
        $this->db->bind('tgl_pinjam', $data['tgl_pinjam']);
        $this->db->bind('tgl_kembali', $data['tgl_kembali']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updatebarang($data)
{  
    // Mengambil data lama
    $lamasibarang = $this->getbarangbyid($data['id']);
    $tglbalik = $lamasibarang['tgl_kembali'];

    // Konversi tanggal ke format DateTime
    $tglKembaliBaru = new DateTime($data['tgl_kembali']);
    $tglPinjam = new DateTime($data['tgl_pinjam']);

    if ($tglKembaliBaru < $tglPinjam) {
        // Tanggal kembali baru lebih awal dari tanggal pinjam, tampilkan pesan kesalahan
        echo '<script>alert("Error: Tanggal kembali tidak boleh lebih awal dari tanggal pinjam.");</script>';
        return 0; // Tidak melakukan pembaruan jika ada kesalahan
    }

    if ($tglKembaliBaru != $tglbalik) {
        // Jika tanggal kembali baru berbeda dari yang lama
        $query = "UPDATE tb_inventaris SET nama_peminjam=:nama_peminjam, jenis_barang=:jenis_barang, no_barang=:no_barang, tgl_pinjam=:tgl_pinjam, tgl_kembali=:tgl_kembali, status='Sudah Kembali' WHERE id=:id";
    } else {
        // Jika tanggal kembali baru sama dengan yang laxma
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