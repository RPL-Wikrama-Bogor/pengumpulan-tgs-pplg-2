// memanggil package
const express = require("express")
// memanggil file buatan sendiri
const bookRouter= require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-router')
const jwt = require('jsonwebtoken')
const accessTokenSecret = '2023-WikramA-exp'
const cors = require('cors')
//menjalankan framwork express
const app = express()
// memberitahu kalau project express ini ketika mengirim data. hanya bisa menggunakan format json
app.use(express.json())
// mengubah req dari url menjadi tipe format json, dan membaca karakter khusus sebagai string
app.use(
    express.urlencoded({
        extended: true,
      })
)

app.use(cors())



const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization

    if(authHeader) {
        return res.status(403).json({message: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if(err){
            return res.status(403).json({message: 'Unauthorized'})
        }

        next()
    })
}
//"eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJlbWFpbCI6ImZhbGxhaGFydGlhbnN5YXJvaG1hbkBnbWFpbC5jb20iLCJ1c2VybmFtZSI6ImZhbGxhaCIsImlhdCI6MTY5OTUyMTIwMn0.ePXodbql_r1odPidxtbyN1cCkBEk_lgRp9kKrUAEQ8o"

const PORT = 3000

app.use('/auth', authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
})
app.get('/filter', (req, res) => {
    res.send(req.query)
})


// app.get('/', (req, res) => res.send('Hello World'))
// app.get('/wikrama', (req,res) => res.send('Hello Wikrama'))
// app.get('/about', (req,res) => res.send('Hello ini adalah halaman about'))


app.listen(PORT,() => 
    console.log(`server berjalan di http://localhost:${PORT}`)
)