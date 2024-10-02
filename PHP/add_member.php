<?php
$host = 'localhost';
$db = 'dvd_store';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบการส่งฟอร์ม
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // เพิ่มสมาชิกใหม่
    $stmt = $conn->prepare("INSERT INTO members (name, email, phone, address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $address);
    
    if ($stmt->execute()) {
        echo "<script>alert('เพิ่มสมาชิกใหม่สำเร็จ!'); window.location.href='members.php';</script>";
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
    <title>เพิ่มสมาชิกใหม่</title>
</head>
<body>
    <h1>เพิ่มสมาชิกใหม่</h1>
    <form method="POST" action="">
        <label for="name">ชื่อ:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">เบอร์โทร:</label>
        <input type="text" id="phone" name="phone"><br><br>

        <label for="address">ที่อยู่:</label>
        <textarea id="address" name="address" required></textarea><br><br>

        <input type="submit" value="เพิ่มสมาชิก">
    </form>
    <br>
    <a href="members.php">กลับไปยังรายชื่อสมาชิก</a>
</body>
</html>

<?php
$conn->close();
?>
