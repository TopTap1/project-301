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
        @import url('https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
    /* ตั้งค่าทั่วไป */
        body {
        font-family: 'Sarabun', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        color: #333;
        height: 100vh;
        display: flex;
        flex-direction: column;
        text-align: center;
        }
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
            <img src="https://www.fms.psu.ac.th/media/2020/03/FMS_Logo_Header_EN.png" alt="PSU Logo" width="500" height="400"/>
            <h2>Login</h2>
            <p>ระบบเลือกตั้งโครงการการบริหารสโมสรนักศึกษาคณะวิทยาการจัดการ</p>
            
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
            <a href="signup.php" class="register-link">don't have account? Register</a>
        </div>
        <div class="right-panel">
            <img src="https://cdn.discordapp.com/attachments/751471820397609094/1300465345718390836/yskiCXexhXcAAAAASUVORK5CYII.png?ex=6720f03b&is=671f9ebb&hm=16abb19c54c4397fdc34e48903d0bf1a3cef6ed08691d47ddeb1a6c34073581a&" alt="Person in a suit" width="660" height="1000"/>
            <img src=" "
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