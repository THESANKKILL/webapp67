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
    function test($str) {
        // ตรวจสอบว่าสตริงมีความยาวอย่างน้อยหนึ่งตัวอักษรหรือไม่
        if (strlen($str) > 0) {
            // หาตัวอักษรสุดท้ายของสตริง
            $s = substr($str,strlen($str) -1);
            // สร้างสตริงใหม่โดยเพิ่มตัวอักษรสุดท้ายที่ด้านหน้าและด้านหลัง
            return $s . $str . $s;
        }
        return "";
    }
    // ทดสอบฟังก์ชัน
    echo test("Red") . "\n";
    echo test("Green") . "\n";
    echo test("1") . "\n";
    ?>

</body>
</html>