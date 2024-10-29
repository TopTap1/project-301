<?php
include 'db_connect.php'; // Connect to the database

$course = isset($_POST['course']) ? $_POST['course'] : null;
$year = isset($_POST['year']) ? $_POST['year'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $errorMessages = [];

    // Password length validation
    if (strlen($password) < 8) {
        $errorMessages[] = "Password must be at least 8 characters long.";
    } elseif ($password !== $confirm_password) {
        $errorMessages[] = "Passwords do not match.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages[] = "Invalid email format.";
    } else {
        // Check for duplicate student ID or email
        $sql = "SELECT * FROM users WHERE student_id = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $student_id, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['student_id'] === $student_id) {
                    $errorMessages[] = "Student ID '$student_id' already exists.";
                }
                if ($row['email'] === $email) {
                    $errorMessages[] = "Email '$email' already exists.";
                }
            }
        }
    }

    // Display error messages if any
    if (!empty($errorMessages)) {
        echo "<div class='error-msg'>" . implode("<br>", $errorMessages) . "</div>";
    } else {

    // แฮชรหัสผ่านก่อนบันทึกลงฐานข้อมูล
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // บันทึกข้อมูลลงฐานข้อมูล
    $sql = "INSERT INTO users (student_id, email, password, course, year) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $student_id, $email, $hashed_password, $course, $year);

        if ($stmt->execute()) {
            // Send verification email
            $to = $email;
            $subject = "Email Verification";
            $message = "Please click the link to verify your email: <a href='verify_email.php?email=" . urlencode($email) . "'>Verify Email</a>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: no-reply@VOTE.FMS.PSU.com" . "\r\n";

            mail($to, $subject, $message, $headers);
            header("Location: signup.php?status=success");
            exit();
        } else {
            echo "<p class='error-msg'>Error signing up. Please try again.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssstyle.css"> <!-- เชื่อมต่อ CSS ของคุณที่นี่ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- เชื่อมต่อ Font Awesome -->
    <title>Sign Up</title>
    <style>
        /* สไตล์ที่คุณมีอยู่ */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .signup-box {
            background-color: white;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .signup-header span {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 20px;
        }

        .input_box {
            position: relative;
            margin-bottom: 20px;
        }

        .input_box input {
            width: 100%;
            padding: 12px 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }

        .input_box input:focus {
            border-color: #007bff;
            outline: none;
        }

        .input_box label {
            position: absolute;
            top: -10px;
            left: 12px;
            font-size: 14px;
            background-color: white;
            padding: 0 5px;
            color: #333;
        }

        .input_box .icon {
            position: absolute;
            right: 15px;
            top: 14px;
            font-size: 20px;
            color: #888;
            cursor: pointer;
        }

        .error-msg {
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
            color: red;
        }

        .success-msg {
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
            color: green;
        }

        .input-submit {
            background-color: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            width: 100%;
            font-size: 16px;
            cursor: pointer;
        }

        .input-submit:hover {
            background-color: #0056b3;
        }

        .login {
            text-align: center;
            margin-top: 20px;
        }

        .login a {
            color: #007bff;
            text-decoration: none;
        }

        .login a:hover {
            text-decoration: underline;
        }
        .close-btn {
    position: absolute;
    top: 10px;
    right: 10%;
    cursor: pointer;
    /*color: #aaa;
    float: right;
    font-size: 24px;*/
}

.close-btn:hover {
    color: black;
}
    </style>
</head>
<body>
<form action="signup.php" method="POST">

    <div class="signup-box">
        <div class="signup-header">
            <span>Create Your Account</span>
        </div>
        <form action="signup.php" method="POST" onsubmit="return validateForm()">
            <div class="input_box">
                <input type="email" name="email" id="email" class="input-field" required>
                <label for="email" class="Label">Email</label>
                <i class="fas fa-envelope icon"></i>
            </div>
            <div class="input_box">
                <input type="text" name="student_id" id="student_id" class="input-field" required>
                <label for="student_id" class="Label">Student ID</label>
                <i class="fas fa-user icon"></i>
            </div>
            <div class="input_box">
                <input type="password" name="password" id="password" class="input-field" required>
                <label for="password" class="Label">Password</label>
                <i class="fas fa-eye icon" id="togglePassword" onclick="togglePassword('password')"></i>
            </div>
            <div class="input_box">
                <input type="password" name="confirm_password" id="confirm_password" class="input-field" required>
                <label for="confirm_password" class="Label">Confirm Password</label>
                <i class="fas fa-eye icon" id="toggleConfirmPassword" onclick="togglePassword('confirm_password')"></i>
            </div>
            <select id="course" name="course" required>
                <option value="">เลือกหลักสูตร</option><br>
                <option value="บัญชี">บัญชี</option>
                <option value="รัฐประศาสนศาสตร์">รัฐประศาสนศาสตร์</option>
                <option value="การเงิน">การเงิน</option>
                <option value="การตลาด">การตลาด</option>
                <option value="การจัดการทรัพยากรมนุษย์">การจัดการทรัพยากรมนุษย์</option>
                <option value="ระบบสารสนเทศทางธุรกิจ">ระบบสารสนเทศทางธุรกิจ</option>
                <option value="การจัดการ (หลักสูตรนานาชาติ)">การจัดการ (หลักสูตรนานาชาติ)</option>
                <option value="การจัดการโลจิสติกส์">การจัดการโลจิสติกส์</option>
                <option value="การจัดการไมซ์">การจัดการไมซ์</option>
            </select>
            <select id="year" name="year" required> 
                <option value="">เลือกชั้นปี</option>
                <option value="ปี 1">ชั้นปี 1</option>
                <option value="ปี 2">ชั้นปี 2</option>
                <option value="ปี 3">ชั้นปี 3</option>
                <option value="ปี 4">ชั้นปี 4</option>
                <option value="ปี 5">ชั้นปี 5</option>
                <option value="ปี 6">ชั้นปี 6</option>
                <option value="ปี 7">ชั้นปี 7</option>
                <option value="ปี 8">ชั้นปี 8</option>
            </select>
            <div id="error-message" class="error-msg"></div>
            <div class="input_box">
                <input type="submit" class="input-submit" value="Sign Up">
            </div>
            <div class="login">
                <span>Already have an account? <a href="logintop.php">Login</a></span>
            </div>
        </form>

        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'success') {
            echo "<p class='success-msg'>Sign Up successful! You can now <a href='login.php'>Login</a>.</p>";
        }
        ?>
    </div>

    <script>
        function togglePassword(id) {
            var input = document.getElementById(id);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
        
        function validateForm() {
            // เพิ่มการตรวจสอบฟอร์มที่นี่หากต้องการ
            return true; // ให้ส่งฟอร์ม
        }
    </script>
</body>
</html>
