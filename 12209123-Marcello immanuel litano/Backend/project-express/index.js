const express = require("express");
const bookRouter = require("./routes/book-route");
const authorRouter = require("./routes/author-route");
const authRouter = require('./routes/auth-router');
const jwt = require('jsonwebtoken')
const cors = require('cors') 
const accessTokenSecret = '2023-wikrama-exp'


const app = express();
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
    return res.satatus(403).json({message: 'Unauthorized'})
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

app.use("/book", bookRouter);
app.use("/author", authorRouter);
app.use("/auth", authRouter);

app.get("/book/:id/:bookname/:year", (req, res) => {
  res.send(req.params);
});
app.get("filter", (req, res) => {
  res.send(req.query);
});

// app.get("/", (req, res) => res.send("Hello World"));

// app.get("/wikrama", (req, res) => res.send("Hello wikrama"));

// app.get("/about", (req, res) => res.send("Hello ini halaman about"));

// app.get('/book',(req,res) => {

//     res.send('GET book code')
// })
// app.get('/book',(req,res) => {

//     res.send('POST book code')
// })
// app.get('/book',(req,res) => {

//     res.send('PUT book code')
// })
// app.get('/book',(req,res) => {

//     res.send('DELETE book code')
// })

//author code
// app.get('/author',(req,res) => {

//     res.send('GET book code')
// })
// app.get('/author',(req,res) => {

//     res.send('POST book code')
// })
// app.get('/author',(req,res) => {

//     res.send('PUT book code')
// })
// app.get('/author',(req,res) => {

//     res.send('DELETE book code')
// })

app.listen(PORT, () =>
  console.log(`Server ini berjalan di http://localhost:${PORT}`)
);
