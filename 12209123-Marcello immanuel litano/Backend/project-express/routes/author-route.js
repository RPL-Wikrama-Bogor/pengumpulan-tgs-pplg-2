const express = require("express");
const router = express.Router();
const authorController = require('../controller/author-controller')

router.get("/", authorController.getAuthors)
router.get("/:id", authorController.getAuthor)
router.post("/", authorController.addAuthor)
router.put("/:id", authorController.editAuthor)
router.delete("/:id", authorController.deleteAuthor)


// router.post("/", (req, res) => {
//   res.send("POST book code");
// });
// router.put("/", (req, res) => {
//   res.send("PUT book code");
// });
// router.delete("/", (req, res) => {
//   res.send("DELETE book code");
// });

module.exports = router;
