<?php
// ข้อมูลการเชื่อมต่อฐานข้อมูล
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
        die("ไม่พบข้อมูลสมาชิก");
    }

    // อัปเดตข้อมูลสมาชิกเมื่อมีการส่งฟอร์ม
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        
        // อัปเดตข้อมูลในฐานข้อมูล
        $update_stmt = $conn->prepare("UPDATE members SET name = ?, email = ?, phone = ? WHERE member_id = ?");
        $update_stmt->bind_param("sssi", $name, $email, $phone, $member_id);

        if ($update_stmt->execute()) {
            echo "แก้ไขข้อมูลสมาชิกเรียบร้อยแล้ว!";
        } else {
            echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล";
        }

        $update_stmt->close();
    }
} else {
    die("ไม่มีข้อมูลสมาชิกที่ต้องการแก้ไข");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลสมาชิก</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"], .form-group input[type="email"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .submit-btn {
            display: inline-block;
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #e55a4f;
        }
        .back-link {
            display: inline-block;
            background-color: #ff6f61;
            color: white;
            padding: 10px 20px;
            text-align: center;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #e55a4f;
        }

        .back-link:active {
            transform: scale(0.95); /* ลดขนาดลงเล็กน้อยเมื่อกด */
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>แก้ไขข้อมูลสมาชิก</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">ชื่อ:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($member['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">อีเมล:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($member['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">เบอร์โทรศัพท์:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($member['phone']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">เบอร์โทรศัพท์:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($member['phone']); ?>" required>
            </div>
            <button type="submit" class="submit-btn">บันทึกการแก้ไข</button>
            <a class="back-link" href="member.php">ยกเลิก</a> 
        </form>
    </div>
</body>
</html>
