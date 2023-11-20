// memanggil package
const express = require('express')
// memanggil file buatan sendiri
const bookRouter = require('./router/book-route')
const authorRouter = require('./router/author-route')
const authRouter = require('./router/auth-router')
const jwt = require('jsonwebtoken')
const cors = require('cors')
const accessTokenSecret = '2023-Wikrama-exp'
// menjalankan framework express
const app = express()
// json = javascript objecty notation
// memberitahu kalau project express ini ketika mengirim data. hanya bisa menggunakan format json
app.use(express.json())
// mengubah req dari url menjadi tipe format json, dan membaca karakter khusus sebagai string
app.use(
    express.urlencoded({
        extended: true
    })
)

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization
    if(!authHeader) {
        return res.status(403).json({message: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]
    jwt.verify(token, accessTokenSecret, (err, user) => {
        if(err) {
            return res.status(403).json({message: 'Unauthorized'})
        }
        
        next()
    })
}
const PORT = 3000

// routing
app.use('/auth', authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.get('/book/:id/:bookname/:year', (req, res) => {
    
    res.send(req.params)
})

app.get('/filter', (req, res) => {
    res.send(req.query);
})

http://localhost:3000/filter?id=1&bookname=atik&year=5000
// app.get('/', (req, res) => res.send('Hello Maman!'))
// app.get('/wikrama', (req, res) => res.send('Hello Wikrama!'))
// app.get('/about', (req, res) => res.send('Hello Ini Adalah Halaman About!'))

// menjalankan aplikasi di port khususu
app.listen(PORT, () =>
    console.log(`Server ini berjalan di http://localhost:${PORT}`)
)
