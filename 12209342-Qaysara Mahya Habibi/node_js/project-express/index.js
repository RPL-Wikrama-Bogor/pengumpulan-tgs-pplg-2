const express = require('express')
// ./ jika tidak ada maka mengambil package yang ada di node modules
const bookRouter = require("./routes/book-route")
const authorRouter = require("./routes/author-route")
const authRouter = require("./routes/auth-route")
const jwt = require('jsonwebtoken')
const accessTokenSecret = 'the-mockingjay'
const cors = require('cors')
// menjalankan framework express
const app = express()
// =json adalah format penulilsan data
// jika ingin memanipulsai data hanya bisa menggunakan json
app.use(express.json())
// mengubah req data dari url menjadi tipe data json dan membaca karakter khusus sebagai string 
app.use(
    express.urlencoded({
        extended: true,
    })
); 

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization
    
    if(!authHeader){
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

const PORT = 2327

// mengau=tur routing
 
app.use('/auth', authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.get('/book/:id/:bookname/:year', (req,res) => {
    res.send(req.params)
})

app.get('filter', (req,res) => {
    res.send(req.query)
})

// app.get() mendefinisikan apa yang perlu dilakukan jika ada request
// app.get('/', (req, res) => {res.send('Hello World!')})
// app.get('/wikrama', (req, res) => {res.send('Hello Wikrama!')})
// app.get('/about', (req, res) => {res.send('Ini adalah halaman About!')})

//app.listen() mendefinisikan di port apa aplikasi akan berjalan
app.listen(PORT, () =>
    console.log(`Aplikasi ini akan berjalan di http://localhost:${PORT}`)
);
