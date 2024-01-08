// memanggil package
const express = require('express');

// memanggil file buatan sendiri
const bookRouter = require('./routes/book-route');
const authorRouter = require('./routes/author-route');
const authRouter = require('./routes/auth-router');
const jwt = require('jsonwebtoken')
const cors = require('cors')

const accessTokenSecret = '2023-wikrama-express'

// menjalankan framework express
const app = express();

// memberi tahu kalo si framework express ini cuman bias pake json
app.use(express.json()) 

// mengubah url 
app.use(
    express.urlencoded({
        extended: true,
    })
)

app.use(cors())

const authenticateJWT = (req, res, next) => {
    const authHeader = req.headers.authorization

    if (!authHeader) {
        return res.status(403).json({mesagge: 'Unauthorized'})
    }

    const token = authHeader.split(' ')[1]

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if (err) {
            return res.status(403).json({mesagge: 'Unauthorized'})
        }

        next()
    })
}

const PORT = 3000;

app.use('/auth', authRouter)
app.use('/book', bookRouter)
app.use('/author', authorRouter)
app.get('/book/:id/:bookname/:year', (req, res) =>{
    res.send(req.params)
})
app.get('/filter', (req, res) => {
    res.send(req.query)
})


// app.use('/auth'.authRouter);
// app.use('/book'.authRouter);
// app.use('/author'.authorRouter);
// app.get('/', (req, res) => res.send('hello world'))
// app.get('/wikrama', (req, res) => res.send('hello wikrama'))
// app.get('/about', (req, res) => res.send('hello about'))

app.listen(PORT, () =>
    console.log(`Server ini akan berjanlan di http://localhost:${PORT}`)
)