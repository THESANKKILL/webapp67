<?php
$host = 'localhost';
$db = 'dvd_store';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่าได้รับ member_id หรือไม่
if (isset($_GET['id'])) {
    $member_id = intval($_GET['id']);
    
    // ดึงข้อมูลสมาชิกตาม ID
    $stmt = $conn->prepare("SELECT * FROM members WHERE member_id = ?");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $member = $result->fetch_assoc();
    } else {
        die("ไม่พบสมาชิก");
    }
} else {
    die("ไม่มีข้อมูลสมาชิก");
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดสมาชิก</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9f5ff;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #ff6f61;
            text-align: center;
            font-size: 2.5em;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        p {
            line-height: 1.6;
            font-size: 18px;
            color: #333;
            margin: 10px 0;
            padding: 10px;
            border-left: 4px solid #ff6f61;
            background-color: #f9f9f9;
        }
        strong {
            color: #ff6f61;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            padding: 12px 20px;
            color: #fff;
            background-color: #28a745;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }
        a:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>รายละเอียดสมาชิก</h1>
    <p><strong>ชื่อ:</strong> <?php echo htmlspecialchars($member['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($member['email']); ?></p>
    <p><strong>เบอร์โทร:</strong> <?php echo htmlspecialchars($member['phone']); ?></p>
    <p><strong>ที่อยู่:</strong> <?php echo htmlspecialchars($member['address']); ?></p>
    <a href="member.php">กลับไปยังรายชื่อสมาชิก</a>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
