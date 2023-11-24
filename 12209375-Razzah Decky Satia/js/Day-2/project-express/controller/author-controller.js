const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
const pool = mysql.createPool(dbConfig)

pool.on('error', (err) => {
    console.error(err)
})

const responseAuthorNotFound = (res) => res.status(404).json({
    success: false,
    message: 'Author Not Found'
})

const responseSuccess = (res, result, message) => res.status(200).json({
    success:true,
    message: message,
    data: result
})

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;';

    pool.getConnection((err, connection) => {
        if (err) throw err;

        connection.query(query, (err, result) => {
            if (err) throw err;

            responseSuccess(res, result, 'author successfully fetched')
        })

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

    const query = 'INSERT INTO author SET ?;'

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if (err) throw err

            responseSuccess(res, results, 'Author successfully added')
        })
        connection.release()
    })
}
const getAuthor = (req, res) => {
    const id = req.params.id;

    const query = `SELECT * FROM author WHERE id = ${id};`;

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

    const query = `UPDATE author SET ? WHERE  id = ${id};`;
    pool.getConnection((err, connection)  => {
        if (err) throw err 

        connection.query(query, [data], (err, results) => {
            if (err) throw err 

            if(results.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }
            responseSuccess(res, results, 'Author succesfully updated')
        })
        connection.release()
    })
}


const deleteAuthor = (req, res) => {
    const id = req.params.id 

    const query = `DELETE FROM  author WHERE  id = ${id};`;

    pool.getConnection((err, connection)  => {
        if (err) throw err 

        connection.query(query,(err, results) => {
            if (err) throw err 

            if(results.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }
            responseSuccess(res, results, 'Author succesfully deleted')
        })
        connection.release()
    })
}


module.exports = {
       getAuthors, getAuthor, addAuthor, editAuthor,  deleteAuthor
    }   