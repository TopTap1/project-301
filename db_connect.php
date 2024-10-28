<?php
$servername = "localhost";
$username = "root";  // เปลี่ยนตามข้อมูลของคุณถ้าไม่ใช่ root
$password = "";      // ปกติจะเป็นค่าว่างใน XAMPP
$dbname = "testdb";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
