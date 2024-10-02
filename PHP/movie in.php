<?php
// ข้อมูลการเชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";  // ใส่ชื่อผู้ใช้ของคุณ
$password = "";  // ใส่รหัสผ่านของคุณ
$dbname = "dvd_store";  // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่าฟอร์มถูกส่งหรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $title = $_POST["title"];
    $director = $_POST["director"];
    $release_year = $_POST["release_year"];
    $description = $_POST["Description "];

    // ตรวจสอบว่าไม่มีช่องไหนที่เว้นว่าง
    if (!empty($title) && !empty($director) && !empty($release_year) && !empty($Description )) {
        // เตรียมคำสั่ง SQL เพื่อเพิ่มข้อมูล
        $sql = "INSERT INTO dvds (title, Director, release_year,Description)
                VALUES ('$title', '$director', '$release_year', '$Description ')";

        // ตรวจสอบว่าคำสั่ง SQL ถูกดำเนินการหรือไม่
        if ($conn->query($sql) === TRUE) {
            echo "เพิ่มภาพยนตร์เรียบร้อยแล้ว!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "กรุณากรอกข้อมูลให้ครบทุกช่อง";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มภาพยนตร์ใหม่</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #ff6f61;
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
            color: #ff6f61;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 100%;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        input[type="submit"] {
            background-color: #ff6f61;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ff4c4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>เพิ่มภาพยนตร์ใหม่</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="title">ชื่อภาพยนตร์:</label>
            <input type="text" id="title" name="title" required>

            <label for="director">ผู้กำกับ:</label>
            <input type="text" id="director" name="director" required>

            <label for="release_year">ปีที่ออกฉาย:</label>
            <input type="text" id="release_year" name="release_year" required>

            <label for="Description ">คำอธิบาย:</label>
            <textarea id="Description " name="Description " required></textarea>

            <input type="submit" value="เพิ่มภาพยนตร์">
        </form>
    </div>
</body>
</html>
