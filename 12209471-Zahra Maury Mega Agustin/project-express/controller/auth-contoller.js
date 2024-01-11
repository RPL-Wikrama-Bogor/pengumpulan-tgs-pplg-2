const dbConfig = require("../config/db-config")
const mysql = require("mysql2")
const jwt = require('jsonwebtoken')
const { connect } = require("../routes/book-route")
const pool = mysql.createPool(dbConfig)
// panggil apa saja yang d butuhkan 

pool.on("error", (err) => {
    console.error(err)
    // d test memakai pool.on
})

const accessTokenSecret = '2023-wikrama-exp'

const responseFailValidate = (res, message) => res.status(400).json({
    success: false,
    messege: message
})

const responseAuthSuccess = (res, token, message, user) => res.status(200).json({
    success: true,
    token: token,
    message: message,
    user: user
})

const register = (req, res) => {
    if (req.body.email == null || req.body.username == null || req.body.password == null){
            responseFailValidate(res, 'Email/Username/Password wajib diisi')
        }

        const data = {
            email: req.body.email,
            username: req.body.username,
            password: req.body.password
        }

        const query = 'INSERT INTO user SET ?;'

        pool.getConnection((err, connection) => {
            if (err) throw err

            connection.query(query, [data], (err, results) => {
                if (err) throw err
                
                if(results.affectedRows >= 1){
                    const token = jwt.sign(
                        { email: data.email, username: data.username },
                        accessTokenSecret
                    )

                    responseAuthSuccess(res, token, 'Register Successful', {
                        email: data.email, 
                        username: data.username
                    })
                } else {
                    res.status(500).json('Failed creating user')
                }
            })
            connection.release()
        })
}
const login = (req, res) => {
    if(req.body.email == null || req.body.password == null){
        responseFailValidate(res, 'Email/Password wajib diisi')
    }

    const { email, password } = req.body
    const query = `SELECT * FROM user WHERE email = '${email}' AND password = '${password}'`

    pool.getConnection((err, connection) => {
        if (err) throw err

        connection.query(query, (err, results) => {
            if (err) throw err

            if (results.length >= 1){
                const user = results.pop()

                const token = jwt.sign(
                    { email: user.email, username: user.username},
                    accessTokenSecret
                )

                responseAuthSuccess(res, token, 'Login Success', {
                    email: user.email,
                    username: user.username
                })
            } else {
                res.status(404).json({message: 'Email or Password is Wrong'})
            }
        })
        connection.release()
    })
}
module.exports = {
    register, login
}
