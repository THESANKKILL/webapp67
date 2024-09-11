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
    function test($s) {
        $ctr_aa = 0;
        // Loop through the string
        for ($i = 0; $i < (strlen($s) - 1);$i++) {
            // Check if current and next character are "aa"
            if (substr($s, $i, 2) == "aa") {
                $ctr_aa++;
                // Move to the next position after "aa"
            }
        }
        return $ctr_aa;
    }
    // Test cases
    echo test("bbaaccaag")."\n";       // Output: 2
    echo "<br>";
    echo test("jikiaaaesw")."\n";      // Output: 3
    echo "<br>";
    echo test("JSaaakoiaa")."\n";      // Output: 2
    ?>
    
</body>
</html>