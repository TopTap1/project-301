<?php
// เริ่มต้น session เมื่อยังไม่ได้เริ่ม
if (session_status() == PHP_SESSION_NONE) {
   
}

// ตั้งค่า session
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'secure' => true,
    'httponly' => true
]);
 session_start();
// เชื่อมต่อฐานข้อมูล
try {
    $conn = new mysqli("localhost", "root", "", "testdb");
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    error_log($e->getMessage());
    $error_message = "เกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล";
}

// ตรวจสอบการส่งข้อมูลจากฟอร์มล็อกอิน
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ตรวจสอบ CSRF token
    if (!isset($_SESSION['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token validation failed');
    }

    // ตรวจสอบจำนวนครั้งที่ล็อกอินล้มเหลว
    if (isset($_SESSION['login_attempts']) && $_SESSION['login_attempts'] > 3) {
        if (time() - $_SESSION['last_login_attempt'] < 300) { // 5 นาที
            $error_message = "กรุณารอ 5 นาทีแล้วลองใหม่อีกครั้ง";
            exit();
        } else {
            $_SESSION['login_attempts'] = 0;
        }
    }

    $student_id = filter_var($_POST['studentID'], FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    // ตรวจสอบความยาวรหัสผ่าน
    if (strlen($password) < 8) {
        $error_message = "รหัสผ่านต้องมีความยาวอย่างน้อย 8 ตัวอักษร";
    } else {
        try {
            $sql = "SELECT * FROM users WHERE student_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $student_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    // รีเซ็ตจำนวนครั้งที่ล็อกอินล้มเหลว
                    unset($_SESSION['login_attempts']);
                    header('Location: indexweb.php');
                    exit();
                } else {
                    // เพิ่มจำนวนครั้งที่ล็อกอินล้มเหลว
                    $_SESSION['login_attempts'] = ($_SESSION['login_attempts'] ?? 0) + 1;
                    $_SESSION['last_login_attempt'] = time();
                    $error_message = "รหัสผ่านไม่ถูกต้อง";
                }
            } else {
                $error_message = "ไม่พบรหัสนักศึกษานี้";
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            $error_message = "เกิดข้อผิดพลาดในระบบ กรุณาลองใหม่ภายหลัง";
        }
    }
}

// สร้าง CSRF token
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            min-height: 100vh;
        }
        .left-panel {
            flex: 1;
            padding: 2rem;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .right-panel {
            flex: 1;
            background: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-message {
            color: #ff0000;
            background-color: rgba(255, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
            width: 100%;
        }
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
            width: 100%;
        }
        .input-group input {
            width: 100%;
            padding: 10px;
            padding-left: 35px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .input-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }
        .remember-me {
            margin-bottom: 1rem;
        }
        .login-btn {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .login-btn:hover {
            background: #0056b3;
        }
        .register-link {
            margin-top: 1rem;
            text-align: center;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <img src="data:image/png;base64,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" alt="PSU Logo" width="550" height="550"/>
            <h2>โครงการการบริหารสโมสรนักศึกษา คณะวิทยาการจัดการ</h2>
            <p>ประจำปีการศึกษา 2568 เพื่อเป็นการส่งเสริมระบบประชาธิปไตย และสร้างความเป็นผู้นำ</p>
            
            <?php if (isset($error_message)): ?>
                <div class="error-message">
                    <?php echo $error_message; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <div class="input-group">
                    <input type="text" name="studentID" placeholder="Student ID" required/>
                    <i class="fas fa-user"></i>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required/>
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>
                <div class="remember-me">
                    <input type="checkbox" id="remember"/>
                    <label for="remember">Remember me</label>
                </div>
                <button type="submit" class="login-btn">Login</button>

            </form>
            <a href="login.php" class="register-link">don't have account? Register</a>
        </div>
        <div class="right-panel">
            <img src="https://cdn.discordapp.com/attachments/751471820397609094/1300465345718390836/yskiCXexhXcAAAAASUVORK5CYII.png?ex=6720f03b&is=671f9ebb&hm=16abb19c54c4397fdc34e48903d0bf1a3cef6ed08691d47ddeb1a6c34073581a&" alt="Person in a suit" width="660" height="750"/>
            <img src="https://cdn.discordapp.com/attachments/751471820397609094/1300470686938173471/v1zIyMjiXDJKZB4IAEkgASMBFDA8FGoMQGTWJoEsoFEhMT6TMVEhLC3Lx5k8nPzydCyXh5eXGvr5qhUKhFEVRpVKpFAaDgSsrK2MASAKJHdnUVlZYWFicmZmpj42NFdHbqrFp8AQkYFMEUMBsytw4WSSABJCA9RBAAbMeWJMkAASQAI2RQAFzKbMjZNFAkgACVgPARQw67ElzgQJIAEkYFMEUMBsytw4WSSABJCA9RBAAbMeWJMkAASQAI2RQAFzKbMjZNFAkgACVgPARQw67ElzgQJIAEkYFMEUMBsytw4WSSABJCA9RBAAbMeWJMkAASQAI2RQAFzKbMjZNFAkgACVgPARQw67ElzgQJIAEkYFMEUMBsytw4WSSABJCA9RBAAbMeWJMkAASQAI2RQAFzKbMjZNFAkgACVgPARQw67ElzgQJIAEkYFMEUMBsytw4WSSABJCA9RBAAbMeWJMkAASQAI2RQAFzKbMjZNFAkgACVgPARQw67ElzgQJIAEkYFMEUMBsytw4WSSABJCA9RBAAbMeWJMk
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.querySelector('input[name="password"]');
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>