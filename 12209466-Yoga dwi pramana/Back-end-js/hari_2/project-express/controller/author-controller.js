const dbConfig = require("../config/db-config");
const mysql = require("mysql2");
const pool = mysql.createPool(dbConfig);

const responseAuthorNotFound = (res) =>
  res.status(404).json({
    succes: false,
    message: "Author Not Found",
  });

const responseSucces = (res, result, message) =>
  res.status(200).json({
    succes: true,
    message: message,
    data: result,
  });

  const getAuthors = (req, res) => {
    const query = "SELECT * FROM author";
   // meyambungkan ke koonfigurasi db sebelum nya
   // parameter 1 : menangkap error
   // parameter 2 : mencoba koneksi ke db nya
    pool.getConnection((err, connection) => {
      // if tanpa {} bisa di gunakan ketika proses dalam if hanya satu
      // kalau pas proses aawal koneksi ketemu err, kode di bawah bakal di skip dan mengembalikan hasil response err-nya
      if (err) throw err;
      // menjalankan perintah sql : parameter 3
      // parameter 1 : variable yang isinya perintah sql
      // parameter 2 (optional) : mengirimkan data (hanya di jalankan untuk tambah/update)
      // parameter 3 : function yang menangani hasil reqs sql nya : 2 parameter (mengambil data error, mengambil data hasil)
      connection.query(query, (err, result) => {
        if (err) throw err;
      // ketika berhasil, format API disamakan dengan di function responSuccess
        responseSucces(res, result, "Authors successfully fetched");
      });
      // memberikan koneksi kalau query nya udah selesai di jalankan 
      connection.release();
    });
  };

   //Cari
  const getAuthor = (req, res) => {
    const id = req.params.id;
    const query = `SELECT * FROM author WHERE id = ${id};`;
  
    pool.getConnection((err, connection) => {
      if (err) throw err;
  
      connection.query(query, (err, result) => {
        if (err) throw err;
  
        if (result.length == 0) {
          responseAuthorNotFound(res);
          return;
        }
  
        responseSucces(res, result, "Authors successfully fetched");
      });
      connection.release();
    });
  };

  // Update
const addAuthor = (req, res) => {
    const data = {
      name: req.body.name,
      year: req.body.year,
      editor: req.body.editor,
      publisher: req.body.publisher,
      city: req.body.city
    };
  
    // ? : parameter yang perlu diisi
    // ? di isi sama connection.query parameter 2
    const query = `INSERT INTO author SET ? ;`;
  
    pool.getConnection((err, connection) => {
      if (err) throw err;
      connection.query(query, [data], (err, result) => {
        if (err) throw err;
        responseSucces(res, result, "Author successfully updated");
      });
      connection.release();
    });
  };
  
  const editAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        editor: req.body.editor,
        publisher: req.body.publisher,
        city: req.body.city
    };
    const id = req.params.id;
  
    const query = `UPDATE author SET ? WHERE Id= ${id};`;
  
    pool.getConnection((err, connection) => {
      if (err) throw err;
      connection.query(query, [data], (err, result) => {
        if (err) throw err;
  
        if (result.affectedRows == 0) {
          responseAuthorNotFound(res);
          return;
        }
        responseSucces(res, result, "Author successfully updated");
      });
      connection.release();
    });
  };

  // Delete
const deleteAuthor = (req, res) => {
    let id = req.params.id;
  
    const query = `DELETE FROM author WHERE id = ${id}`;
  
    pool.getConnection((err, connection) => {
      if (err) throw err;
  
      connection.query(query, (err, result) => {
        if (err) throw err;
  
        if (result.affectedRows == 0) {
          responseAuthorNotFound(res);
          return;
        }
        responseSucces(res, result, "Author successfully deleted");
      });
      connection.release();
    });
  };
module.exports = {
    getAuthors,
    getAuthor,
    addAuthor,
    editAuthor,
    deleteAuthor
}