// menyediakan
const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
// const { get } = require('../routes/book-route')
// const { connect } = require('mysql2/typings/mysql/lib/connection')
// createPool : menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig)

pool.on('error',(err) => {
    console.error(err)
})
// membuat format  hasil api kalau http response status code nya 400 an
const responseBookNotFound = (res) => res.status(400).json({
    success: false,
    message: 'Author Not Found'
})
//membuat format hasil api kalau http response status codenya 200 an
const responseSuccess = (res, result, message) => res.status(200).json({
    success: true,
    message: message,
    data: result
})

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;';
    // menyambungkan ke konfigurasi db sebelumnya
    // parameter 1 : menangkap error
    // parameter 2 : mencoba koneksi ke dbnya
    pool.getConnection((err, connection) => {
        // if tanpa {} bisa digunakan ketika proses dalam if hanya satu
        // kalau pas proses awal koneksi ketemu err, kode dibawah bakal di skip dan mengembalikan hasil response err-nya
        if (err) throw err;
        //menjalankan perintah sql : parameter 3
        // parameter 1 : variable yang isinya perintah sql
        // parameter 2 (optional) : variable yang mengirim data (hanya dijalankan untuk tambah/update)
        //parameter 3 :  function yang menangani hasil reqs sql nya : 2 parameter ( mengambil data err,nengambil data hasil)
        connection.query(query, (err, result) => {
            if (err) throw err;
            // ketika berhasil,format apinya disamakan dengan di func responseSucces    xxxxxxxxxxxxxxxxxxxxxxxx    dudan
            responseSuccess(res, result, 'Author successfully fetched')
        })
        //memberhentikan koneksi kalu query nya uda selesai dijalanin
        connection.release()
    })
}

const getAuthor = (req, res) => {
    const id = req.params.id;

    const query = `SELECT * FROM author WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, results) => {
            if (err) throw err;

            if (results.length == 0) {
                responseBookNotFound(res);
                return;
            }

            responseSuccess(res, results, 'Author successfully fetched')
        });

        connection.release();
    });
};

const addAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };
    // ?: parameter yang perlu diisi
    // ?: 
    const query = 'INSERT INTO author SET ?;';

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            responseSuccess(res, results, 'Author successfully added');
        });

        connection.release();
    });
};

const editAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };

    const id = req.params.id;

    const query = `UPDATE author SET ? WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, [data], (err, results) => {
            if (err) throw err;

            if(results.affectedRows == 0) {
                responseBookNotFound(res)
                return
            }

            responseSuccess(res, results, 'Author successfully updated')
        });

        connection.release();
    });
};

const deleteAuthor = (req, res) => {
    const id = req.params.id;

    const query = `DELETE FROM author WHERE id = ${id};`;
 
    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            if(results.affectedRows == 0) {
                responseBookNotFound(res)
                return
            }

            responseSuccess(res, results, 'Author successfully deleted')
        });

        connection.release();
    });
};
// kalau ga diesxport gabisa di pake, wajib
module.exports = {
    getAuthors, getAuthor ,addAuthor, editAuthor, deleteAuthor
}