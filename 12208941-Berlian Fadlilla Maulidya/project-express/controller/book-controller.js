const dbConfig = require("../config/db-config")
const mysql = require("mysql2")
const { connect } = require("../routes/book-route")
const pool = mysql.createPool(dbConfig)
// panggil apa saja yang d butuhkan 

pool.on("error", (err) => {
    console.error(err)
    // d test memakai pool.on
})

const responseBookNotFound = (res) =>
    res.status(404).json({
        success: false,
        message: "BooK Not Found", // 
        // lalu membuat respon untuk bantuan saja
    });
const responseSuccess = (res, result, message) =>
    res.status(200).json({
        success: true,
        message: message,
        data: result,
        // buat function lalu d res setelah itu d ubah message nya d json
    })

const getBooks = (req, res) => {
    // buat data buku , buat query database lalu d konekan lalu muncul error nya
    // setelah d 
    const query = "SELECT * FROM books;";

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) => {
            if (err) throw err

            responseSuccess(res, result, "Book successfully fetched")
            // kode nya, lalu d panggil responsesucces 
        })

        connection.release()
    })
}

const addBook = (req, res) => {
    // sama aja cuman pke query 
    const data = {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count,
    }

    const query = " INSERT INTO books SET ?;";

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, result) => { 
            if (err) throw err

            responseSuccess(res, result, "Book successfully added")
        })

        connection.release()
    })
}

const getBook = (req, res) => {
    const id = req.params.id

    const query = `SELECT * FROM books WHERE id = ${id};`;

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) => {
            if (err) throw err

            if (result.length == 0) {
                responseBookNotFound(res)
                return
            }

            responseSuccess(res, result, 'Book successfullt fetched')
        })

        connection.release()
    })
}

const editBook = (req, res) => {
    const data = {
        name: req.body.name,
        author: req.body.author,
        publisher: req.body.publisher,
        year: req.body.year,
        page_count: req.body.page_count,
    }

    const id = req.params.id

    const query = `UPDATE books SET ? WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, result) => {
            if (err) throw err

            if (result.affectedRows == 0) {
                responseBookNotFound(res)
                return
            }
            responseSuccess(res, result, 'Book successfully updated')
        })
    })
}

const deleteBook = (req, res) => {
    const id = req.params.id

    const query = `DELETE FROM books WHERE id = ${id}`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) => {
            if (err) throw err

            if (result.affectedRows == 0) {
                responseBookNotFound(res)
                return
            }

            responseSuccess(res, result, 'Book successfully deleted')
        })

        connection.release()
    })
}

module.exports = {
    getBooks, addBook, getBook, editBook, deleteBook
}