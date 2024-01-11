const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
// createPull = menghubungkan project ke db hanya sekali di awal
const pool = mysql.createPool(dbConfig)

pool.on('error', (err) => {
    console.error(err)
})

// membuat format hasil API kalau http response status code nya 400-an
const responseAuthorNotFound = (res) => res.status(404).json({
    success: false,
    message: 'Author not found'
})

// membuat format hasil API kalau http response status code nya 200-an
const responseSuccess = (res, result, message) => res.status(200).json({
    success: true,
    message: message,
    data: result
})
    
const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;'
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
           // parameter 3 : function yang menangani hasil reqs sql nya : 2 parameter (mengambil data error,  mengambil data hasil)

        connection.query(query, (err, result) => {
            if (err) throw err
            // ketika berhasil, format API disamakan dengan di func responSuccess

            responseSuccess(res, result, 'Author successfully fetched!')
        })

        // memberhentikan koneksi kalau query sudah selesai digunakan
        connection.release()
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

    // ? = parameter yang perlu diisi
    // ? diisi sama connection.query parameter ke 2
    const query = 'INSERT INTO author SET ?;'

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if (err) throw err

            responseSuccess(res, results, 'Book successfully added!')
        })
        connection.release()
    })
}
const getAuthor = (req, res) => {
    const id = req.params.id

    const query = `SELECT * FROM author WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) => {
            if (err) throw err

            if (result.lenght == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Author successfully fetched!')
        })

        connection.release()
    })

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

            if(result.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Author successfully updated!')
        })
        connection.release()
    })
}

const deleteAuthor = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) => {
            if (err) throw err

            if(result.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Author successfully deleted!')
        })

        connection.release()
    })
}

// kalau ga di export gabisa dipake, bagian ini wajib di isi
module.exports = {
    getAuthors, getAuthor, addAuthor, editAuthor, deleteAuthor
}