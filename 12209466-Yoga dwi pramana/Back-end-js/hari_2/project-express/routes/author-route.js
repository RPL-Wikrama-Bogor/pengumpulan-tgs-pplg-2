const express = require("express")
const Router = express.Router()
const authorController = require('../controller/author-controller')

Router.get('/', authorController.getAuthors)
Router.get('/:id', authorController.getAuthor)
Router.post('/', authorController.addAuthor)
Router.put('/:id', authorController.editAuthor)
Router.delete('/:id', authorController.deleteAuthor)


module.exports = Router