const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
// const router = require('../routes/Author-route')
const pool = mysql.createPool(dbConfig)

pool.on('error', (err) => {
    console.error(err)
})

// membuat format api
// = => tipe data function arrow function
const responseAuthorNotFound = (res) => res.status(404).json({
    success: false,
    message: 'Author Not Found'
})

const responseSuccess = (res, result, message) => res.status(200).json({
    success: true,
    message: message,
    data: result
})

// response adalha hasil req
const getAuthors = (req,res) => {
    const query = 'SELECT * FROM author;';
    // parameter pertama menagkap error, kedua mencoba mengkoneksi ke db
    pool.getConnection((err, connection) => {
        // jika ada error maka kembalikan deskripsi errornya
        if(err) throw err;
        
        // menjalan kan perintah sql. parameter kedua isinya opsional = menigirm data (bentuknya variabel)
        //parameter pertama menjalankan sql (bentuknya variabel)
        // parameter ketiga berbentuk function untuk menanggapi request
        connection.query(query, (err, result) => {
            if(err) throw err;
            
            // ketika berhasil format apinya disamakan dengan di function
            // argumen pertama = mangambil tipe http response
            // argumen kedua = masuk ke data, nampilin
            // argumen ketiga = masuk ke message
            responseSuccess(res, result, 'Authors successfully fetched');
            
        });

        //memberhentikan koneki jika query sudah selesai dijalankan
        connection.release();
    });
};

const getAuthor = (req,res) => {
    const id = req.params.id;

    const query = `SELECT * FROM author WHERE id = ${id};`;

    pool.getConnection((err, connection) => {                                                                                                                                                                                                                                                                                                                                                                                                                       
        if(err) throw err;
        
        connection.query(query, (err, results) => {
            if(err) throw err;

            if (results.length == 0){
                responseAuthorNotFound(res);
                return;
            }

            responseSuccess(res, results, 'Authors successfully fetched');
            
        });
        connection.release();
    });
};

const addAuthor = (req,res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    };
    
    // tanda tanya bersifat sebagai parameter yang perlu diisi
    const query = 'INSERT INTO author SET ?;'
    
    pool.getConnection((err, connection)=>{
        if (err) throw err;
        
        
        connection.query(query, [data], (err, results) => {
            if (err) throw err;
            
            responseSuccess(res,results, 'Author Successfully added')
            
        });
        connection.release();
    });
};

const editAuthor = (req,res) => {
    const data = {
        name: req.body.name,
        year: req.body.year,
        publisher: req.body.publisher,
        city: req.body.city,
        editor: req.body.editor,
    }; 

    const id = req.params.id

    const query = `UPDATE author SET ? WHERE id = ${id}`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, [data], (err, results) => {
            if (err) throw err

            if (results.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, results, 'Author Successfully Fetched')
        })
        connection.release()
    })
} 

const deleteAuthor = (req,res) => {
    const id = req.params.id
    const query = `DELETE FROM author WHERE id = ${id}`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            if (results.affectedRows == 0) {
                responseAuthorNotFound(res)
                return
            }

            responseSuccess(res, results, 'Author Successfully Deleted')
        })
        connection.release()
    })
}

module.exports = {
    getAuthors, addAuthor, getAuthor, editAuthor, deleteAuthor
}