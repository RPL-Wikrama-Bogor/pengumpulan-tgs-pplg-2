const { resolve } = require('dns');
const http = require('http');
const { testFunction, newFunction } = require('./function');

const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            resolve('sudah sampai');
            // reject('saya kena tilang');
      }, 1000 * 5);
    });
 
};

var server = http.createServer((req, res) => {
    switch  (req.url) {
            case '/about':
                console.log('saya otw');
                printAgakTelat() 
                . then((value) => {
                    console.log(value);
                    console.log('ngopi');
                })
                . catch((error) => console.log(error));
             
                res.write('ini about');
                res.end();
                break;
            case '/contact':
                res.write('ini contact');
                res.end();
                break;
            default:
                res.write('404 Not Found');
                res.end();
                break;

    };

    // if (req.url == '/about'){
    //     res.write('ini about');
    //     res.end();
    // } else if(req,url == '/contact') {
    //     res.write('ini contact');
    //     res.end();
    
    // }else {
    //     res.write('404 Not Found');
    //     res.end();
    // }
});

const port =  3000 ;
server.listen(port, () => {
    console.log(`Server Berjalan di http://localhost:${port}`);
});