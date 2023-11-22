const http = require('http');
const { testFunction, newFunction } = require('./function');

// promise
const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('saya sudah sampai');
        }, 1000 * 5);
    });
}

var server = http.createServer(async( req, res) => {
    // http://localhost:3000/about
    switch (req.url) {
        case '/about':
            console.log('saya otw');
            const value = await
            printAgakTelat();
            console.log(value);
            console.log('ngopi')
            res.write('ini about');
            res.end();
            break;
        case '/contact':
            res.write('ini contact');
            res.end();
        default:
            res.write('404 not found');
            res.end();
            break;
    }
});

const port = 3000;
server.listen(port, ()=> {
console.log(`Server berjalan di http://localhost:${port}`);
});