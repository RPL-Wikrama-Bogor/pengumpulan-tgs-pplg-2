const dbConfig = require('../config/db-config')
const mysql = require('mysql2')
const jwt = require('jsonwebtoken')
const { connect } = require('../routes/book-route')
const pool = mysql.createPool(dbConfig)

pool.on('error', (err) => {
    console.error(err)
})

const accessTokenSecret = '2023-wikrama-express'

const responseFailValidate = (res, message) => res.status(400).json({
    success : false,
    message : message
})

const responseAuthSuccess = (res, token, message, user) => res.status(200).json({
    success : true,
    token : token,
    message : message,
    user : user
})

const register = (req, res) => {
    if (req.body.email == null || req.body.username == null || req.body.password == null) {
            responseFailValidate(res, 'Email atau password wajib di isi')
        }

        const data = {
            email : req.body.email,
            username : req.body.username,
            password : req.body.password
        }

        const query = 'INSERT INTO users SET ?;'

        pool.getConnection((err, connection) => {
            if (err) throw err

            connection.query(query, [data] , (err, result) => {
                if (err) throw err

                if(result.affectedRows >= 1){
                    const token = jwt.sign(
                        { email: data.email, username: data.username },
                        accessTokenSecret
                    )

                    responseAuthSuccess(res, token, 'Register successful', {
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
    if(req.body.email == null || req.body.password == null) {
    responseFailValidate(res, 'Email/password wajib di isi')
    }

    const { email, password } = req.body

    const query = `SELECT * FROM USERS WHERE EMAIL = '${email}' AND PASSWORD = '${password}' `

    pool.getConnection((err, connection) => {
        if(err) throw err

        connection.query(query, (err, result) => {
            if(err) throw err

            if (result.length >= 1){
                const user = result.pop()
                
                const token = jwt.sign(
                    {email: user.email, password: user.password},
                    accessTokenSecret
                )

                responseAuthSuccess(res, token, 'Login success', {
                    email: user.email,
                    username: user.username
                })
            } else {
                res.status(404).json({message: 'Email or password is incorrect'})
            }      
            connection.release()
        })
    })
}

module.exports = {
    register, login
}

