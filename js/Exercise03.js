const digitize = n =>[...`${Math.abs(n)}`].map(i =>parseInt(i));
  console.log(digitize(-123));  // [1, 2, 3]
  console.log(digitize(-1230)); // [1, 2, 3, 0]
