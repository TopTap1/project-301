<?php
// เริ่มต้น session เมื่อยังไม่ได้เริ่ม
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// เชื่อมต่อฐานข้อมูล
$conn = new mysqli("localhost", "root", "", "testdb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบการส่งข้อมูลจากฟอร์มล็อกอิน
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['studentID']; // รับข้อมูล Student ID
    $password = $_POST['password']; // รับข้อมูลรหัสผ่าน

    // ตรวจสอบว่ารหัสนักศึกษาและรหัสผ่านมีในฐานข้อมูล
    $sql = "SELECT * FROM users WHERE student_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: indexweb.php'); // เปลี่ยนไปที่ indexweb.php
            exit();
        } else {
            $error_message = "Invalid Password."; // รหัสผ่านไม่ถูกต้อง
        }
    } else {
        $error_message = "Invalid Student ID."; // รหัสนักศึกษาไม่ถูกต้อง
    }
}

// แสดงข้อความผิดพลาด
if (isset($error_message)) {
    echo "<p class='error-msg'>{$error_message}</p>";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .wrapper {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }
        .login-box {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }
        .login-header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .input_box {
            position: relative;
            margin-bottom: 20px;
        }
        .input-field {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .input-submit {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .input-submit:hover {
            background-color: #45a049;
        }
        .error-msg {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="login-box">
            <div class="login-header">เข้าสู่ระบบ</div>
            <form action="login.php" method="POST">
                <div class="input_box">
                    <input type="text" name="studentID" class="input-field" placeholder="รหัสนักศึกษา" required>
                </div>
                <div class="input_box">
                    <input type="password" name="password" class="input-field" placeholder="รหัสผ่าน" required>
                </div>
                <div class="input_box">
                    <input type="submit" class="input-submit" value="เข้าสู่ระบบ">
                </div>
            </form>
            <div class="register-link">
                <p>ยังไม่มีบัญชี? <a href="signup.php">ลงทะเบียน</a></p>
            </div>
        </div>
    </div>
</body>
</html>
