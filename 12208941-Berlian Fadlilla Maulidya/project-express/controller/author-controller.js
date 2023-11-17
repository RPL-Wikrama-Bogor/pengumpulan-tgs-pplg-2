// konfigurasi menyambungkan ke db
// menyediakan ruang
const dbConfig = require("../config/db-config")
const mysql = require("mysql2")
// create pool utk menghubungkan projek ke db hanya sekali di awal 
const pool = mysql.createPool(dbConfig)

pool.on("error", (err) => {
    console.error(err)
})
// membuat format hasil API kalau http response status code nya 400-an
const responseAuthorNotFound = (res) =>
    res.status(404).json({
        success: false,
        message: "Author Not Found", 
    });
// membuat format hasil API kalau http response status code nya 200
const responseSuccess = (res, result, message) =>
    res.status(200).json({
        success: true,
        message: message,
        data: result,
    })
// untuk me request , respon
const getAuthors = (req, res) => {
    // menyimpan query sql
    const query = "SELECT * FROM author;";
// menyambungkan ke konfigurasi yang sdh d jalani
    pool.getConnection((err, connection) => {
        // if tanpa {} bisa d gunakan ketika proses dlm if hanya satu
        // kalau pas proses awa; koneksi ketemu err, kode d bawah bakal d skip dan mengembalikan hasil response err nya
        if (err) throw err
// untuk menjalankan perintah sql : parameternya ada 3 
// parameter 2 (optional) : mengirim data (hanya d jalankan utk tambah/ upadate)
// parameter 3 : function yang menangani hasil reqs sql nya : 2 parameter (mengambil data err, mengambil data hasil)
        connection.query(query, (err, result) => {
            if (err) throw err
// ketika berhasil format API nya d samakan dgn d function respSuccess
            responseSuccess(res, result, "Author successfully fetched")
        })
// utk memberhentikan koneksi klw query nya sdh selesai d jalanin
        connection.release()
    })
}

const addAuthor = (req, res) => {
    // samain kyk db , kl body samain kyk field postman raw
    const data = {
        id: req.body.id,
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    }
// ? d query utk parameter yang perlu d isi
// ? di isi sama connection query parameter 2
// [data] samain kyk const nya
    const query = " INSERT INTO author SET ?;";

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, result) => {
            if (err) throw err

            responseSuccess(res, result, "Author successfully added")
        })

        connection.release()
    })
}

const getAuthor = (req, res) => {
    const id = req.params.id

    const query = `SELECT * FROM author WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) => {
            if (err) throw err

            if (result.length == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Author successfullt fetched')
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
        editor: req.body.editor,
    }

    const id = req.params.id
// ${} utk memanggil variable , hanya bisa memakai backtip ``

    const query = `UPDATE author SET ? WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, result) => {
            if (err) throw err

            if (result.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }
            responseSuccess(res, result, 'Author successfully updated')
        })
    })
}

const deleteAuthor = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM author WHERE id = ${id}`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) => {
            if (err) throw err

            if (result.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, result, 'Author successfully deleted')
        })

        connection.release()
    })
}
// utk meng export , klw ga d export td bs d pakai , wajib d pakai 
module.exports = {
    getAuthors, addAuthor, getAuthor, editAuthor, deleteAuthor
}