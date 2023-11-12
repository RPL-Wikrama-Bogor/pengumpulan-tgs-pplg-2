// menyediakan 
const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
//createPool : menghubungkan ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig)
// kalau ada err =, err nya di munculin di console
pool.on('error', (err) => {
    console.error(err)
})
// membuat format hasil API kalau http response status codenya 400-an
const responseAuthorNotFound = (res) => res.status(404).json({
    success: false,
    message: 'Author Not Found'
})
// membuat format hasil API kalau http response status codenya 200                                          
const responseSuccess = (res, result, message) =>
res.status(200).json({
    success:true,
    message: message,
    data: result
})

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;';
    // menyambungkan ke konfigurasi db sblmnya
    // parameter 1 : menangkap error
    // parameter 2 : mencoba koneksi ke db nya
    pool.getConnection((err, Connection) => {
    // if tanpa {} bisa di gunakan ketika proses dalam if hanya satu
    // kalau pas proses aawal koneksi ketemu err, kode di bawah bakal di skip dan mengembalikan hasil response err-nya

        if (err) throw err;
      // menjalankan perintah sql : parameter 3
      // parameter 1 : variable yang isinya perintah sql
      // parameter 2 (optional) : mengirimkan data (hanya di jalankan untuk tambah/update)
      // parameter 3 : function yang menangani hasil reqs sql nya : 2 parameter (mengambil data error, mengambil data hasil)
        Connection.query(query, (err, result) => {
            if (err) throw err
// ketika berhasil, format API disamakan dengan di func responSuccess

            responseSuccess(res, result, 'Author successfully fetched')
        })
        // memberhentikan koneksi kalau query nya udah selesai dijalankan
        Connection.release();
    })
}

const addAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor
    }
    // ? : parameter yg perlu diisi
    // ? diisi sama connection.query parameter ke 2
    const query = 'INSERT INTO author SET ?;'

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, result) => {
            if (err) throw err

            responseSuccess(res, result, 'Author successfully added')
        })
        connection.release()
    })
}
const getAuthor = (req, res) => {
    const id = req.param.id;

    const query = `SELECT * FROM authors WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, result) => {
            if (err) throw err;

            if (result.length == 0 ) {
                responseAuthorNotFound(res);
                return;
            }

            responseSuccess(res, result, 'Author successfully fetched');
        });

        connection.release();
    });

}

const editAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor
    }

    const id = req.params.id

    const query = `UPDATE author SET ? WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, result) => {
            if (err) throw err

            if(result.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Author successfully updated');
        });
        connection.release();
    })
}

const deleteAuthor = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id}`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) => {
            if (err) throw err

            if(result.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Author Successfully deleted')
        })
        connection.release();
    })
}
    // kalau ga di export gabisa dipake, bagian ini wajib diisi
    module.exports = {
        getAuthors, getAuthor, addAuthor, editAuthor, deleteAuthor
}