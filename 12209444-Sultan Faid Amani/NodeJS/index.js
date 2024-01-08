const http = require('http');
const { resolve } = require('path');

const { testFunction, newFunction} = require('./function');

const printAgakTelat = () => {
    return new Promise((resolve, reject)=>
    setTimeout(() => {
        resolve('Sudah sampai')
    }, 1000 * 5)
    )};

var server = http.createServer(async(req, res) => 
{
    switch (req.url) {
        case '/about':
            console.log('Saya otw')
            const value = await 
            printAgakTelat()
            console.log(value);
            console.log('asu rudy')
            // testFunction();
            // newFunction('ini berasal dari parameter');
            res.write('ini about');
            res.end();
            break;

        case '/contact':
            res.write('ini contact');
            res.end();
            break;
    
        default:
            res.write('404 NOT FOUND');
            res.end();
            break;
    }

    // if (req.url == '/about') {
    //     res.write('ini about');
    //     res.end();
    // }
    // else if (req.url == '/contact') {
    //     res.write('ini contact');
    //     res.end();
    // }
    // else {
    //     res.write('404 NOT FOUND');
    //     res.end();
    // }    
});

const port = 3000;
server.listen(port, () =>{
    console.log(`Server berjalan di http://localhost:${port}`);
});
