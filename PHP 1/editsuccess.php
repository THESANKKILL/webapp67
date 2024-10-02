<?php
require 'conn.php';
$sql_update = "UPDATE studentbio SET sname='$_POST[sname]', slastname='$_POST[slastname]', address='$_POST[address]', telephone='$_POST[telephone]' WHERE sid='$_POST[sid]'";
$result = $conn->query($sql_update);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="good.css">
    <title>Document</title>
</head>
<body>
<?php
if (!$result) {
    echo '<div class="error-message">Error: ' . $conn->error . '</div>';
} else {
    echo '<div class="success-message">Edit Success</div>';
    header("refresh: 1; url=mainmenu.php");
}
?>
</body>
</html>