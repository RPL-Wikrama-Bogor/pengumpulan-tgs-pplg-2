// memanggil package
const express = require('express');
// memanggil file buatan sendiri
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const cors = require('cors')
const accessTokenSecret = '2023-WikramA-exp'
// menjalanakan Framework express
const app = express()
// memberitahu kalau project express ini ketika mengirim data. hanya bisa menggunakan fromat json
app.use(express.json())
// mengubah req dari url menjadi tipe format json, dan membaca karakter khusus sebagai string 332 1187
app.use(
    express.urlencoded({
        extended: true,
    })
)

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization

    if(!authHeader) {
        return res.status(401).json({message: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if(err) {
            return res.status(401).json({message: 'Unauthorized'})
        }

        next()
    })
}

const PORT = 3000

// routing
app.use('/book',  bookRouter)
app.use('/author', authorRouter)
app.use('/auth', authRouter)
app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
})
app.get('/query', (req, res) => {
    res.send(req.query)
})


app.listen(PORT, () => 
 console.log(`Server ini berjalan di http://localhost:${PORT}`)
)
// app.get('/', (req, res) => res.send('Hello world'))

// app.get('/wikrama', (req, res) => res.send('Hello Wikrama'))

// app.get('/about', (req, res) => res.send('Hello ini adalah halaman about'))

// app.get('/book', (req, res) => { htt
//     res.send('Get book code')
// })

// app.post('/book', (req, res) => {
//     res.send('POST book code')
// })
// app.put('/book', (req, res) => {
//     res.send('PUT book code')
// })
// app.delete('/book', (req, res) => {
//     res.send('DELETE book code')
// })


// app.get('/author', (req, res) => {
//     res.send('Get author code')
// })
// app.post('/author', (req, res) => {
//     res.send('POST author code')
// })
// app.put('/author', (req, res) => {
//     res.send('PUT author code')
// })
// app.delete('/author', (req, res) => {
//     res.send('DELETE author code')
// })
