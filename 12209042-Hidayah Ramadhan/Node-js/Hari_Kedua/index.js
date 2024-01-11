const http = require('http');
const {testFunction,newFunction} = require('./function');

//promise
const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('saya sudah sampai');
            // reject('saya kena tilang');
        }, 1000 * 5 );
    });
}

var server = http.createServer(async(req, res) => {
    switch (req.url) {
        case '/about' :
            console.log('saya otw');
            const value = await printAgakTelat();
            console.log(value);
            console.log('ngopi');
            res.write('Ini About');
            res.end();
            break;
        case '/contact' :
            res.write('Ini Contact');
            res.end();
            break;
        default:
            res.write('404 Not Found')
            res.end();
            break;
            }
    },
    // if ( req.url == '/about') {
    //     res.write('Ini About');
    //     res.end();
    //     else if (req.url == '/contact') {

    //     }
    // } else {
    //     res.write('404 Not Found')
    //     res.end();
    // }
);


const port = 3000;
server.listen(port, () => {
    console.log(`server berjalan di http://localhost:${port}`);
});