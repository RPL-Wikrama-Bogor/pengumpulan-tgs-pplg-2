// memanggil package
const express = require('express')
// memanggil file buatan sendiri
const bookRouter= require('./routes/book-route')
const authorRouter= require('./routes/author-route')
const authRouter= require('./routes/auth-route')
const jwt = require('jsonwebtoken')
const cors = require('cors')

const accesTokenSecret = '2023-wikramA-exp'
// menjalankan framework express
const app = express()
// memberitahu kalau project express ini ketika mengirim data, hanya bias mengguankan format json
app.use(express.json())
// mengubah req dari url menjadi tipe format json dan membaca karakter khusus menjadi string
app.use(
    express.urlencoded({
        extended: true,
    })
)

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization

    if (!authHeader){
        return res.status(403).json({message: 'Unauthorized'})
    }
    const token = authHeader.split(' ')[1]

    jwt.verify(token, accesTokenSecret, (err, user) =>{
        if(err){
            return res.status(403).json({ message:'Unauthorized' })
        }
        next()
    })
}

const PORT = 4000

//routing
app.use ('/book', bookRouter)
app.use ('/author', authorRouter)
app.use ('/auth', authRouter)

app.get('/book/:id/:bookname/:year', (req, res) => {
    res.send(req.params)
})

app.get('/filter', (req, res) => {
    res.send(req.query)
})

// app.get('/', (req, res) => res.send('Hello World'))

// app.get('/', (req, res) => res.send('Hello Wikrama'))

// app.get('/', (req, res) => res.send('Hello about wikrama'))

app.listen(PORT, () =>
 console.log(`Server ini berjalan di http://localhost:${PORT}`))