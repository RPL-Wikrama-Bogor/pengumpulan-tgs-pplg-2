const express = require("express")
const router = express.Router()
const authorController = require('../controller/author-controller')

router.get('/', authorController.getAuthors);
router.get('/:id', authorController.getAuthor);
router.post('/', authorController.addAuthors);
router.put('/:id', authorController.editAuthor);
router.delete('/:id', authorController.deleteAuthor)

module.exports = router