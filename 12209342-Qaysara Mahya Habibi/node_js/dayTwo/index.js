const { resolveSoa } = require('dns');
// CommonJS / ESM = Ecmascript
const http = require('http');
const { testFunction, newFunction } = require('./function');

// var server = http.createServer((req, res) => {
//     res.write('Saya qay');
//     //untuk mengirim ke user, equals to cout
//     res.end()0;
// });

// PROMISE 
const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('Sudah sampai');
            // reject('Saya kena tilang');
        }, 1000 * 5 //ini delaynya, dengan satuan milisecond
        );
    });
}

var server = http.createServer(async(req, res) => {
    switch (req.url) {
        case '/about':
            console.log('Saya kelas 11');
            console.log('Saya rombel PPLG');
            const value = printAgakTelat();
                // //resolve, jika tampil sblm 5 detik maka jalankan ini
                // .then((value) => console.log('Aku suka bubur'))
                // // reject, jika tidak tampil jalankan ini
                // .catch((error) => console.log('Ngopi'))
            // testFunction();
            // newFunction('Ini berasal dari parameter');
            console.log(value);
            console.log('Ngopi');
            res.write('Ini about!');
            res.end();
            break;
        case '/contact':
            res.write('Ini contact!');
            res.end();
            break;
        default:
            res.write('404 Not Found');
            res.end();
            break;
    }
    // if(req.url == '/about'){
    //     res.write('Ini about!');
    //     res.end();
    // }else {
    //     res.write('404 Not Found');
    //     res.end();

    // }
});

const port = 3000;
server.listen(port);
console.log(`Server berjalan di http://localhost:${port}`);