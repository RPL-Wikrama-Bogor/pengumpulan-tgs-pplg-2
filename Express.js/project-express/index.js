// memanggil pakage
const express = require('express')
// memanggil file buatan sendiri
const bookRouter = require('./router/book-route')
const authorRouter = require('./router/author-route')
const authRouter = require('./router/auth-router')
const jwt = require('jsonwebtoken')
const cors = require('cors')
// menjalankan framework express
const accessTokenSecret = '2023-Wikrama-exp'
// emeberitahu kalau project express ini ketika mengirim data, hanya bisa menggukanan format json
const app = express();
// mengubah req dari url menjadi format json, dan membaca karakter khusus sebagai string
app.use(express.json())
app.use(
    express.urlencoded({
        extended: true,
    })
) 

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization

    if (!authHeader) {
        return res.status(403).json({
            message: 'Unauthorized'
        })
    }
    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if (err) {
            return res.status(403).json({message: 'Unauthorized'})
        }
        next()
    })
}


const PORT = 3000;

app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.use('/auth', authRouter)

app.get('/book/:id/:bookname/:year', (req, res) =>{
    res.send(req.params)
})

app.get('/filter', (req, res) =>{
    res.send(req.query)
})


app.listen(PORT, () =>
    console.log(`Server ini berjalan di http://localhost:${PORT}`))


// app.get('/', (req, res) => res.send("Welcome"))

// app.get('/wikrama', (req, res) => res.send("Hello wikrama!"))

// app.get('/about', (req, res) => res.send("Hello about"))

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


