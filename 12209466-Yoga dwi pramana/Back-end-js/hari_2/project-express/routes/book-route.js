const express = require("express")
const Router = express.Router()
const bookController = require('../controller/book-controller')

Router.get('/', bookController.getBooks)
Router.get('/:id', bookController.getBook)
Router.post('/', bookController.addBook)
Router.put('/:id', bookController.editBook)
Router.delete('/:id', bookController.deleteBook)

// router.post('/', (req, res) => {
//     res.send('POST book code')
// })
// router.put('/', (req, res) => {
//     res.send('PUT book code')
// })
// router.delete('/', (req, res) => {
//     res.send('DELETE book code')
// })


module.exports = Router