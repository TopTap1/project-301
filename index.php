<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FMS Online Vote</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

/* Tab */
.tab {
    overflow: hidden;
    background-color: #ab47bc;
    display: flex;
    justify-content: flex-end;
    padding: 20px 20px;
    align-items: center;
    position: relative;
}

.tab img {
    position: absolute;
    left: 20px;
    height: 50px;
}

.tab button {
    background-color: transparent;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 18px;
    color: white;
    transition: all 0.3s ease;
}

.tab button:hover {
    color: #e1bee7;
}

.tab button.active {
    color: white;
    font-weight: bold;
}

 /* ปุ่มเข้าสู่ระบบ */
 .login-btn {
    background-color: #ab47bc;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    cursor: pointer;
    margin: 30px auto;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.login-btn:hover {
    background-color: #9c27b0; /* ปรับสีเมื่อ hover */
}


.tabcontent {
    display: none; /* ซ่อนเนื้อหาแท็บอื่นๆ */
}

.tabcontent.active {
    display: block; /* แสดงเนื้อหาของแท็บที่เปิด */
}
</style>
</head>
<body>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'หน้าแรก')" id="defaultOpen">หน้าแรก</button>
        <button class="tablinks" onclick="openTab(event, 'ผลการโหวต')">ผลการโหวต</button>
        <button class="tablinks" onclick="openTab(event, 'ผู้มาใช้สิทธิ์')">ผู้มาใช้สิทธิ์</button>
    </div>

    <!-- หน้าแรก -->
    <div id="หน้าแรก" class="tabcontent">
        <h2>โครงการการบริหารสโมสรนักศึกษาคณะวิทยาการจัดการ</h2>
        <p>ประจำปีการศึกษา 2568 เพื่อเป็นการส่งเสริมระบอบประชาธิปไตย และสร้างความเป็นผู้นำ</p>
        <button class="login-btn" onclick="openModal()">เข้าสู่ระบบ</button>
    </div>

    <script>
        function openTab(evt, tabName) {
            const tabcontent = document.getElementsByClassName("tabcontent");
            for (let i = 0; i < tabcontent.length; i++) {
                tabcontent[i].classList.remove("active");
            }
            const tablinks = document.getElementsByClassName("tablinks");
            for (let i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }
            document.getElementById(tabName).classList.add("active");
            evt.currentTarget.classList.add("active");
        }

        function openModal() {
            // ฟังก์ชันสำหรับการเปิดโมดัล
            alert("โมดัลเข้าสู่ระบบจะถูกเปิดขึ้น");
        }

        // เปิดแท็บเริ่มต้นเมื่อโหลดหน้า
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById("defaultOpen").click();
        });
    </script>
</body>
</html>