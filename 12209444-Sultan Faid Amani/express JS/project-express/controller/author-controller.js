const dbConfig = require('../config/db_config')
const mysql = require('mysql2')
const pool = mysql.createPool(dbConfig)

pool.on('error', (err) => {
    console.error(err)
})

const responseAuthorNotFound = (res) => res.status(404).json({
    success: false,
    message: 'Author not found'
})

const responseSuccess = (res, result, message) => res.status(200).json({
    success: true,
    message: message,
    data: result
})

const getAuthors = (req, res) => {
    const query = 'SELECT * FROM author;';

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, result) =>{
            if (err) throw err

        responseSuccess(res, result, 'Author successfully fetched')
        })

        connection.release();
    })
}

const addAuthors = (req, res) => {
    const data = {
        name: req.body.name,
        publisher: req.body.publisher,
        year: req.body.year,
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
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            if (results.length == 0) {
                responseAuthorNotFound(res);
                return;
            }
            
            responseSuccess(res, results, 'Author successfully fetched');
        });

        connection.release();
    });
};

const editAuthor = (req, res) => {
    const data = {
        name: req.body.name,
        publisher: req.body.publisher,
        year: req.body.year,
        city: req.body.city,
        editor: req.body.editor
    }

    const id = req.params.id

    const queery = `UPDATE author SET ? WHERE id = ${id};`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(queery, [data], (err, results) => {
            if (err) throw err

            if(results.affectedRows == 0){
                responseAuthorNotFound(res)
                return
            }
            
                responseSuccess(res, results, 'Author succesfully updated')
        });
    })
}

const deleteAuthor = (req, res) => {
    const id = req.params.id
  
    const query = `DELETE FROM author WHERE id = ${id}`;
  
    pool.getConnection((err, connection) => {
      if(err) throw err
  
      connection.query(query, (err, results) => {
        if(err) throw err
  
        if(results.affectedRows == 0){
          responseAuthorNotFound(res)
          return
        }
        responseSuccess(res, results, 'Author Successfully Deleted')
      })
      connection.release()
    })
  }

module.exports = {
    getAuthors, addAuthors, getAuthor, editAuthor , deleteAuthor    
}