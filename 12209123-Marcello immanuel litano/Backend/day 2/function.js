const testFunction = () => {
    console.log('Saya berasal dari function.js')
};

const newFunction = (message) => {
    console.log(message)
};
module.exports = {
    testFunction,
    newFunction
}