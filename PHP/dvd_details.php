<?php
$host = 'localhost';
$db = 'dvd_store';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่าได้รับ dvd_id หรือไม่
if (isset($_GET['id'])) {
    $dvd_id = intval($_GET['id']);
    
    // ดึงข้อมูลดีวีดีและนักแสดงตาม ID
    $stmt = $conn->prepare("SELECT * FROM dvds WHERE dvd_id = ?");
    $stmt->bind_param("i", $dvd_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $dvd = $result->fetch_assoc();
    } else {
        die("ไม่พบดีวีดี");
    }
} else {
    die("ไม่มีข้อมูลดีวีดี");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดดีวีดี</title>
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
        .movie-details {
            margin-bottom: 20px;
        }
        .movie-details strong {
            color: #ff6f61;
        }
        .description {
            padding: 10px;
            background-color: #f9f9f9;
            border-left: 4px solid #ff6f61;
            margin-bottom: 15px;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            background-color: #ff6f61; /* สีพื้นหลัง */
            color: white; /* สีตัวอักษร */
            padding: 10px 20px; /* ระยะห่างระหว่างขอบกับข้อความ */
            font-size: 1.2em;
            font-weight: bold;
            border-radius: 25px; /* ทำมุมมน */
            transition: background-color 0.3s ease, transform 0.3s ease; /* เพิ่มเอฟเฟ็กต์เมื่อชี้ */
        }

        .back-link:hover {
            background-color: #e55a4f; /* เปลี่ยนสีเมื่อชี้ */
            transform: scale(1.05); /* ขยายขนาดเล็กน้อยเมื่อชี้ */
        }

        .back-link:active {
            transform: scale(0.95); /* ลดขนาดลงเล็กน้อยเมื่อกด */
        }
    </style>
</head>
<body>
<div class="container">
    <h1>รายละเอียดดีวีดี</h1>
    <div class="movie-details">
    <p><strong>ชื่อภาพยนตร์:</strong> <?php echo htmlspecialchars($dvd['title']); ?></p>
    <p><strong>ประเภท:</strong> <?php echo htmlspecialchars($dvd['genre']); ?></p>
    <p><strong>ผู้กำกับ:</strong> <?php echo htmlspecialchars($dvd['Director']); ?></p>
    <p><strong>ปีที่ออกฉาย:</strong> <?php echo htmlspecialchars($dvd['release_year']); ?></p>
    <p><strong>ราคา:</strong> <?php echo htmlspecialchars($dvd['price']); ?> บาท</p>
    </div>
    <div class="description">
    <p><strong>คำอธิบาย:</strong> <?php echo htmlspecialchars($dvd['Description']); ?> </p>
    </div>
    <a class="back-link" href="dvd.php">กลับไปยังรายการดีวีดี</a>
</div>

</body>
</html>
<?php
$stmt->close();
$conn->close();
?>
