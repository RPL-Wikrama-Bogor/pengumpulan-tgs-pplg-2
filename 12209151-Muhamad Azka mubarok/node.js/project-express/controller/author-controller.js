// menyediakan
const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
// createPool : menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig)
// kalau ada error,error nya dimunculin di console
pool.on('error',(err) => {
    console.error(err)
})
// membuat format hasil API kalau http response status code nya 400-an
const responseAuthorNotFound = (res) => res
    .status(404).json({
        succes: true,
        message: 'Author not found',
    })
// membuat format hasil API kalau http response status code 200
const responseSuccess = (res,result,message) => res
    .status(200).json({
        succes: true,
        message: message,
        data: result 
})

const getAuthors = (req,res) => {
    const query = 'SELECT * FROM author;'
    // menyambungkan ke konfigurasi db sebelumnya
    // parameter 1:menangkap error
    // parameter 2: mencoba koneksi ke dbnya
    pool.getConnection((err, connection) => {
        // if tanpa {} bisa digunakan ketika proses dalam if hanya satau
        // kalau pas proses awal koneksi ketemu error,kode dibawah bakal di skip dan mengembalikan hasil response err-nya
        if (err) throw err
        // menjalankan perintah sql :paramater 3
        // parameter 1 : variable yang isinya perintah sql
        // parameter 2 : (optional) variable mengirim data(hanya dijalankan untuk tambah/update)
        // parameter 3 : function yang menangani hasil reqs sqlnya : 2 parameter(mengambil data err,mengambil data hasil)
        connection.query(query, (err, result) => {
            if (err) throw err
            // ketika berhasil format APi disamakan dengan function responseSuccess
            responseSuccess(res, result, 'Author successfully fetched')
        })
        // memberhentikan koneksi kalau query nya udah selesai dijalanin
        connection.release()
    })
}
const getAuthor = (req,res) => {
    const id = req.params.id
    const query = `SELECT * FROM author WHERE id = ${id}`

    pool.getConnection((err, connection) => {
        if (err) throw err
        connection.query(query, (err, result) => {
            if (err) throw err

            if (result.length < 1) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Authors successfully fetched')
        })

        connection.release()
    })
}
const addAuthors = (req,res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor
    }

    const query = 'INSERT INTO author SET ?;'

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, result) => {
            if (err) throw err

            responseSuccess(res, result, 'Authors successfully added')
})

        connection.release()
})
}

const editAuthor = (req,res) => {
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
        connection.query(query, [data], (err,result) => {
            if (err) throw err

            if(result.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Authors successfully updated')
        })
        connection.release()
    })
}

const deleteAuthor = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id}`

    pool.getConnection((err,connection) => {
        if(err) throw err

        connection.query(query, (err,result) => {
            if (err) throw err


            if (result.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }
            responseSuccess(res, result, 'Authors successfully deleted')
        })
        connection.release()
    })
}
// kalau ga di export gabisa dipake,wajib
module.exports = {
    getAuthors, addAuthors, getAuthor, editAuthor, deleteAuthor
}

