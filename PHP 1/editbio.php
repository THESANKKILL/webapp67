<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="ko.css">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_GET['sid'])){
            header("refresh: 0; url=mainmenu.php");
        }
        require 'conn.php';
        $sql = "SELECT * FROM studentbio WHERE sid='$_GET[sid]'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    ?>
    <form method="post" action="editsuccess.php">
        <p>

            <label>ชื่อ</label>
            <input type="text" name="sid" id="sid" value="<?=$row['sid'];?>" hidden>
            <input type="text" name="sname" id="sname" value="<?=$row['sname'];?>" />

        </p>
        <p>
            <label>นามสกุล</label>
            <input type="text" name="slastname" id="slastname" value="<?=$row['slastname'];?>" />

        </p>
        <p>

            <label>ที่อยู่</label>
            <input type="text" name="address" id="address" value="<?=$row['address'];?>" />

        </p>
        <p>
            <label>เบอร์โทร</label>
            <input type="text" name="telephone" id="telephone" value="<?=$row['telephone'];?>" />
        </p>
        <input type="submit" value="บันทึก">
        <a href='mainmenu.php'><button> Home</button></a>
    </form>

</body>
</html>