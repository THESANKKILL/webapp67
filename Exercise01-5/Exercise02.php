<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   
    function checkTemperature($temp1, $temp2) {
        if (($temp1 < 0 && $temp2 > 100) || ($temp2 < 0 && $temp1 > 100)) {
           return "True";
        } else {
           return "False";
       }
    }
    // Test cases
    echo checkTemperature(120, -1);  // Output: True
    echo "<br>";
    echo checkTemperature(2, 120);   // Output: False
    echo "<br>";
    echo checkTemperature(-1, 120);  // Output: True
    echo "<br>";
    echo checkTemperature(50, 50);   // Output: False
    ?>

</body>
</html>