<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสมาชิกใหม่</title>
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
            margin-bottom: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            color: #ff6f61;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>เพิ่มสมาชิกใหม่</h1>
        <form action="add_member.php" method="POST">
            <label for="name">ชื่อ:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">เบอร์โทร:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">วันที่เข้าร่วม:</label>
            <textarea id="address" name="address" rows="4" required></textarea>

            <input type="submit" value="เพิ่มสมาชิก">
        </form>
        <a class="back-link" href="member.php">กลับไปยังรายชื่อสมาชิก</a>
    </div>
</body>
</html>