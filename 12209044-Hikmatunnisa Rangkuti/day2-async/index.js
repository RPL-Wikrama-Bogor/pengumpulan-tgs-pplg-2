const http = require("http");
const { testFunction, newFunction } = require("./function");

//promise[]
const printAgaTelat = () => {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      resolve("Sudah sampai");
      // reject('saya kena tilang');
    }, 1000 * 5);
  });
};
// const testFuncion = require("./function");
//commonJs  / ESM -ecmascript
//require mau import http
var server = http.createServer(async (req, res) => {
  switch (req.url) {
    case "/about":
      console.log("saya otw");
      const value = await printAgaTelat();
      console.log(value);

      // .then((value) => { console.log(value);
      console.log("ngopi");
      // })
      // .catch((error) =>console.log(error));

      // testFunction();
      // newFunction('Ini berasal dari parameter');
      res.write("Ini about");
      res.end();
      break;
    case "/contact":
      res.write("Ini contact");
      res.end();
      break;
    //agar tidak lanjut ke bawah
    default:
      res.write("404 Not Found");
      res.end();
      break;
  }

  // if(req.url == '/about') {
  //     res.write('Ini about');
  //     res.end();
  // }else {
  //     res.write('404 Not Found');
  //     res.end();
  // }

  //   res.write("Saya Node.js");
  //   //write mau nulis apa mau output apa
  //   res.end();
  //   //mengasih tau kalo u selesai nulis apa aya
});
//listener atau callback di sebut function

const port = 3000;
server.listen(port, () => {
  console.log(`Server berjalan di http://localhost:${port}`);
});
