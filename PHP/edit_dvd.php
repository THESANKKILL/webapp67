<?php
$host = 'localhost';
$db = 'dvd_store';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบการส่ง ID ของภาพยนตร์
if (isset($_GET['id'])) {
    $dvd_id = intval($_GET['id']);
    
    // ดึงข้อมูลภาพยนตร์ตาม ID
    $stmt = $conn->prepare("SELECT * FROM dvds WHERE dvd_id = ?");
    $stmt->bind_param("i", $dvd_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $dvd = $result->fetch_assoc();
    } else {
        die("ไม่พบภาพยนตร์");
    }
} else {
    die("ไม่มีข้อมูลภาพยนตร์");
}

// ตรวจสอบการส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_year = $_POST['release_year'];
    $price = $_POST['price'];

    // อัปเดตข้อมูลภาพยนตร์
    $stmt = $conn->prepare("UPDATE dvds SET title = ?, genre = ?, release_year = ?, price = ? WHERE dvd_id = ?");
    $stmt->bind_param("ssidi", $title, $genre, $release_year, $price, $dvd_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('อัปเดตข้อมูลภาพยนตร์สำเร็จ!'); window.location.href='dvd.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาด: " . $conn->error . "');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลภาพยนตร์</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4a4e69;
            margin-bottom: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>แก้ไขข้อมูลภาพยนตร์</h1>
        <form method="POST" action="">
            <label for="title">ชื่อภาพยนตร์:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($dvd['title']); ?>" required>

            <label for="genre">ประเภท:</label>
            <input type="text" id="genre" name="genre" value="<?php echo htmlspecialchars($dvd['genre']); ?>" required>

            <label for="release_year">ปีที่ออกฉาย:</label>
            <input type="number" id="release_year" name="release_year" value="<?php echo htmlspecialchars($dvd['release_year']); ?>" required>

            <label for="price">ราคา:</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($dvd['price']); ?>" required>

            <input type="submit" value="อัปเดตข้อมูล">
        </form>
        <a href="dvd.php">กลับไปยังรายชื่อภาพยนตร์</a>
    </div>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
