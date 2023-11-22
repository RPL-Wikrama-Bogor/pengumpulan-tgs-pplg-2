const http = require('http');
const { newFunction, testFunction } = require('./function');
const { Console } = require('console');
// comonJs / ESM - Emaskscript

const printAgakTelat = () => {
    return new Promise((resolve, reject) => {
        setTimeout(() =>{
            resolve('sudah sampai');
            // reject('saya kena tilang');
        }, 1000 * 5 );
    });
}


var server = http.createServer(async(req, res) => {
    switch(req.url){
    case '/about':
        console.log('saya otw');
        const value = await 
        printAgakTelat()
        console.log(value)
        console.log('ngopi')
        res.write('ini about')
            // .then((value) => {
            //     console.log(value),
            //     console.log('ngopi')
            // })
            // .catch((eror) => 
            // console.log(eror));
        res.end();
        break;

    case '/contact':
        res.write('ini contact');
        res.end();
        break;
    default:
        res.write('404 Not found');
        res.end();
        break;
    }


    // if(req.url == '/about'){
    //     res.write('ini about');
    //     res.end();
    // }  else (req.url == '/contact'){
    //     res.write('404 Not found');
    //     res.end();
    // }


    // res.write('saya node.js');
    // res.end();
});

const port = 3000;
server.listen(port, () => {
    console.log(`Server berjalan di http:://localhost:${port}`);
});