<?php
$host = 'localhost';
$db = 'dvd_store';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลสมาชิก
$sql = "SELECT * FROM members";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลสมาชิก</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

h1 {
    text-align: center;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #f1f1f1;
}

a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
.back-link {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            background-color:#00CCFF; /* สีพื้นหลัง */
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
        <h1>รายชื่อสมาชิก</h1>
        <table>
            <thead>
                <tr>
                    <th>หมายเลขสมาชิก</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>อีเมล</th>
                    <th>หมายเลขโทรศัพท์</th>
                    <th>วันที่เข้าร่วม</th>
                    <th>รายละเอียด</th>
                    <th>แก้ไขข้อมูลสมาชิก</th>
                </tr>  
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    // แสดงข้อมูลสมาชิก
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["member_id"] . "</td>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["phone"] . "</td>
                                <td>" . $row["address"] . "</td>
                                <td><a href='member_details.php?id=" . $row["member_id"] . "'>ดูรายละเอียด</a></td>
                                <td><a href='edit.php?id=" . $row["member_id"] . "'>edit</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>ไม่มีข้อมูลสมาชิก</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a class="back-link" href="dvd.php">กลับไปยังรายการดีวีดี</a>  
        <a class="back-link" href="member_up.php">เพิ่มสมาชิกใหม่</a>  
    </div>
</body>
</html>