<?php
$host = 'localhost';
$db = 'dvd_store';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลดีวีดีพร้อมนักแสดง
$query = "
SELECT dvds.dvd_id, dvds.title, dvds.genre, dvds.release_year, dvds.price, 
GROUP_CONCAT(actors.name SEPARATOR ', ') AS actor_names
FROM dvds
LEFT JOIN dvd_actors ON dvds.dvd_id = dvd_actors.dvd_id
LEFT JOIN actors ON dvd_actors.actor_id = actors.actor_id
GROUP BY dvds.dvd_id";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการดีวีดีภาพยนตร์</title>
  <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #e9ecef;
        }
        tr:nth-child(odd) {
            background-color: #ffffff;
        }
        tr:hover {
            background-color: #d1ecf1;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }
        .btn-add {
            display: inline-block;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
        .btn-add:hover {
            background-color: #218838;
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
    <h1>รายการดีวีดีภาพยนตร์</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ชื่อภาพยนตร์</th>
                <th>ประเภท</th>
                <th>ปีที่ออกฉาย</th>
                <th>ราคา</th>
                <th>นักแสดง</th>
                <th>รายละเอียด</th>
                <th>แก้ไข</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['genre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['release_year']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . " บาท</td>";
                    echo "<td>" . htmlspecialchars($row['actor_names']) . "</td>";
                    echo "<td><a href='dvd_details.php?id=" . $row['dvd_id'] . "'>ดูรายละเอียด</a></td>";
                    echo "<td><a href='edit_dvd.php?id=" . $row['dvd_id'] . "'>แก้ไข</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>ไม่มีข้อมูลดีวีดี</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a class="back-link" href="movie in.php">เพิ่มดีวีดีใหม่</a>
    <a class="back-link" href="member.php">สมาชิก</a>
</body>
</html>

<?php
$conn->close();
?>
