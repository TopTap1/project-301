<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FMS Online Vote</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="style.css">
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

</body>
</html>