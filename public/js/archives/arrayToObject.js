const arrayToObj = arr => arr.reduce((acc , [key, value])=>{
    acc[key] = value;
    return acc;
}, {});
