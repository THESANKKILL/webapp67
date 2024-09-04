const random_Number_In_Range = (min, max) => 
  Math.random() * (max - min) + min;

  console.log(random_Number_In_Range(2, 10));
  console.log(random_Number_In_Range(1, 5));