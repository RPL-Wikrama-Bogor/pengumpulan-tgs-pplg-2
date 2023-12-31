// memanggil peckage
const express = require('express')
// memanggil file buatan sendiri
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const cors = require('cors')
const accessTokenSecret = '2023-Wikrama-exp';

// menjalankan framework express
const app = express()
// memberitahu kalau project express ini ketika mengrim data. hanya bisa menggunakan format json
app.use(express.json())
// mengubah req dari url menjadi tipe format json, dan membaca karakter khusus sebagai string
app.use(
    express.urlencoded ({
        extended: true,
    })
)

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization
    if (!authHeader) {
        return res.status(403).json({ message: 'Unauthorization'})
    }

    const token = authHeader.split(' ')[1];

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if(err){
            return res.status(403).json({ message: 'Unauthorized'})
        }
        next()
    })
}

const PORT = 3000
// Routing 
app.use('/author', authorRouter)
app.use('/book', bookRouter) //authenticateJWT
app.use('/auth', authRouter)

app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params);
});
app.get('/filter', (req, res) => {
    res.send(req.query);
})


// app.get('/', (req, res) => res.send('Hello Wordl!'))

// app.get('/wikrama', (req, res) => res.send('Hello Wikrama!'))

// app.get('/about', (req, res) => res.send('Hello ini adalah halaman about!'))



app.listen(PORT, () => console.log(`Server ini berjalan di http://localhost:${PORT}`))