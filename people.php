<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้มาใช้สิทธิ</title>
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
        align-items: center;
        text-align: center;
    }
    /* กราฟผลการโหวต */
    canvas {
        width: 100% !important;
        height: auto !important;
        max-width: 600px;
        max-height: 400px;
        margin: 20px auto;
        display: block;
    }
    </style>
</head>
<body>
<div id="ผู้มาใช้สิทธิ์" class="tabcontent">
    <h3>ผู้มาใช้สิทธิแยกตามหลักสูตร</h3>
    <canvas id="courseChart" width="400" height="200"></canvas>
    <h3>ผู้มาใช้สิทธิแยกตามชั้นปี</h3>
    <canvas id="yearChart" width="400" height="200"></canvas>
</div>

<script>
    var courses = {'บัญชี': 0, 'รัฐประศาสนศาสตร์': 0, 'การเงิน': 0, 'การตลาด': 0, 'การจัดการทรัพยากรมนุษย์': 0, 'ระบบสารสนเทศทางธุรกิจ': 0, 'การจัดการ (หลักสูตรนานาชาติ)': 0, 'การจัดการโลจิสติกส์': 0, 'การจัดการไมซ์': 0};
    var years = {'ปี 1': 0, 'ปี 2': 0, 'ปี 3': 0, 'ปี 4': 0, 'ปี 5': 0, 'ปี 6': 0, 'ปี 7': 0, 'ปี 8': 0};

    new Chart(document.getElementById('courseChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(courses),
            datasets: [{
                label: 'ผู้มาใช้สิทธิ์ตามหลักสูตร',
                data: Object.values(courses),
                backgroundColor: 'rgba(153, 102, 255, 0.6)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

    new Chart(document.getElementById('yearChart'), {
        type: 'bar',
        data: {
            labels: Object.keys(years),
            datasets: [{
                label: 'ผู้มาใช้สิทธิ์ตามชั้นปี',
                data: Object.values(years),
                backgroundColor: 'rgba(255, 159, 64, 0.6)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });
    // คำสั่งนี้ควรจะมีฟังก์ชันที่เกี่ยวข้องในการเปิดแท็บ
    // document.getElementById("defaultOpen").click();
    
</script>
</body>
</html>
