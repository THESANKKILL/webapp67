const matches = (obj, source) => 
Object.keys(source).every(key => 
    obj.hasOwnProperty(key) && obj[key] === source[key]
);

const obj1 = { name: 'John', age: 25, city: 'New York' };
const obj2 = { age: 25, city: 'New York' };
console.log(matches(obj1, obj2)); // true
const obj3 = { name: 'John', age: 30, city: 'New York' };
console.log(matches(obj1, obj3)); // false