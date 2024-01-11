const express = require('express')
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const cors = require('cors')
const accessTokenSecret = '2023-WikramA-exp'



// utk menjalankan framework express
const app = express()
//json tipedata objek 
// utk  memberitahu kl project express ini ketika mengirim data hanya bisa menggunakan format json 
app.use(express.json())
//mengubah req dari url menjadi tipe format json, dan membaca karakter khusus sebagai string
app.use(
    express.urlencoded({ // utk pemanggilan lalu membuat controller
        extended: true,
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
        if(err){
            return res.status(403).json({message: 'Unauthorized'})
        }

        next()
    })
}

const PORT = 3000


// routing url 
// middleware menjaga hak akses dari users 
// path dinamis bisa berubah rubah
app.use('/auth', authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)
// app.get('/book/:id/:bookname/:year', (req, res) => {
//     res.send(req.params)
// })
// app.get('/filter', (req, res) => {
//   n  res.send(req.query)
// })

// app.get('/', (req, res) => res.send('Hello World'))

// app.get('/wikrama', (req, res) => res.send('Hello Wikrama'))

// app.get('/about', (req, res) => res.send('Hello ini adalah halaman about'))

// app.get('/book', (req, res) => {
//     res.send('GET book code')
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
//     res.send('GET author code')
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

// utk menjalankan aplikasi d port khusus 
app.listen(PORT, () =>
    console.log(`Server berjalan do http://localhost:${PORT}`)
)