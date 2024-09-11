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
    function test($x,$y) {
            return ($x >= 20 && $x <= 50) || ($y >= 20 && $y <= 50);
    }
        // Test cases
        var_dump(test(14, 50)); // true
        echo "<br>";
        var_dump(test(11, 45)); // true
        echo "<br>";
        var_dump(test(25, 40)); // true
        echo "<br>";
        var_dump(test(25, 60)); // true
        echo "<br>";
        var_dump(test(10, 19)); // false
        ?>
</body>
</html>