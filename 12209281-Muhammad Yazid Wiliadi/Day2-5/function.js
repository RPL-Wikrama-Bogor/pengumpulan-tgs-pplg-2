const testFunction = () => {
    console.log('saya dari function JS');
};

module.exports = testFunction;

const newFunction = (message) => {
    console.log('message')
};

module.exports = {
    testFunction,
    newFunction,
}