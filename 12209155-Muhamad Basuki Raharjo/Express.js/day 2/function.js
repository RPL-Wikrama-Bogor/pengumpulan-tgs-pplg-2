const testFunction = () => {
    console.log('saya berasal dari function.js')
};

const newFunction = (mesage) => {
    console.log(mesage)
}

module.exports = {
    testFunction,
    newFunction,
}