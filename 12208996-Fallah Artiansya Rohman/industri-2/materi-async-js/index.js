const http = require('http');
const { newFunction, testFunction } = require('./function')
// CommonJs / ESM - Ecmascript

// promise
const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('Sudah sampai');
            // reject('Saya kena tilang');
        }, 1000 * 5);
    });
    
}

var server = http.createServer(async(req, res) =>{
    // res.write('Saya node.js');
    // res.end()
    switch (req.url) {
        case '/about':
            // testFunction();
            // newFunction('Ini berasal dari parameter');
            console.log('Saya otw');
            const value = await printAgakTelat();
            console.log(value);
            console.log('Ngopi');
            res.write('Ini about');
            res.end();
            break;
        case '/contact':
            res.write('Ini contact');
            res.end();
            break;
        default:
            res.write('404 Not Found');
            res.end();
            break;
    }
    // if (req.url == '/about') {
    //     res.write('Ini about');
    //     res.end();
    // } else if (req.url == '/contact') {

    // }
    // else {
    //     res.write('404 Not Found');
    //     res.end();
    // } 
});

const port = 3000;
server.listen(port, () => {
    console.log(`Server berjalan di http://localhost:${port}`);
});
