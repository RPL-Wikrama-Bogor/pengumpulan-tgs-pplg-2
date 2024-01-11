const testFunction = () => {
    console.log('Saya Berasal dari function.js')
};

const newFunction = () => {
    console.log('newFunction - function.js')
};

module.exports ={
    testFunction,
    newFunction,
};

// module.exports = testFunction;