<?php
require 'conn.php';
$sql_update = "INSERT INTO studentbio(sid,sname, slastname, address, telephone) VALUES ('$_POST[sid]','$_POST[sname]', '$_POST[slastname]', '$_POST[address]', '$_POST[telephone]')";
$result = $conn->query($sql_update);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="oh.css">
    <title>Document</title>
</head>
<body>
<body>
<div class="message-container">
<?php
if (!$result) {
    echo '<div class="error-message">Error: ' . $conn->error . '</div>';
} else {
    echo '<div class="success-message">Insert Success! Your ID is: ' . $row["sid"] . '</div>';
    header("refresh: 2; url=mainmenu.php");
}
?>
</div>

</body>
</html>