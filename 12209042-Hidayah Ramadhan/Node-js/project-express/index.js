const express = require('express')
const bookRouter = require('./routes/book-route')
const authorRouter = require('./routes/author-route')
const authRouter = require('./routes/auth-router')
const jwt = require('jsonwebtoken')
const cors = require('cors')
const accessTokenSecret = '2023-WikramA-exp'


const app = express()
app.use(express.json())
app.use(
    express.urlencoded({
        extended: true,
    })
)

app.use(cors())

const authenticateJWT= (req, res, next) => {
    const authHeader = req.headers.authorization
    if(!authHeader) {
        return res.status(403).json({message: 'Unauthorization authHeader'})
    }

    const token = authHeader.split(' ')[1];

    jwt.verify(token, accessTokenSecret, (err, user) => {
        if(err){
            return res.status(403).json({message: 'Unauthorized token'})
        }
        next()
    })
}
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
// app.get('/', (req, res) => res.send('Hello bangg'))
// app.get('/wikrama', (req, res) => res.send('Hello Wikrama'))
// app.get('/about', (req, res) => res.send('Hello ini adalah about'))


app.listen(PORT, () => console.log(`server berjalan di http://localhost:${PORT}`))