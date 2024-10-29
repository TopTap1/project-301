<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรดเลือกพรรค</title>
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
            background: #E0BBE4;
            color: #fff;
        }

        h1 {
        font-size: 2.5em;
        margin-bottom: 20px;
        color: black; /* ตั้งค่าสีตัวอักษรเป็นสีดำ */
        }

        /* สไตล์ฟอนต์ */
        h1, h2, h3, h4, .tab button {
        font-family: 'Sarabun', sans-serif;
        }

        /*.header .menu {
            position: absolute;
            right: 10px;
            top: 10px;
        }
        .header .menu button {
            background-color: #000;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 0 5px;
            border-radius: 5px;
            cursor: pointer;
        }
        .header .menu button:hover {
            background-color: #333;
        }*/

        .container { /* ส่วนหัว */
            text-align: center;
            padding: 20px;
        }

        .card-container { /* การ์ด */
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #e0e0e0;
            border-radius: 10px;
            width: 300px;
            padding: 20px;
            color: #000;
            text-align: left;
            position: relative;
        }

        .card img {
            width: 100%;
            border-radius: 10px;
        }

        .card h2 {
            font-size: 1.5em;
            margin: 10px 0;
        }

        .card p {
            font-size: 1em;
            margin: 10px 0;
        }

        .card ul {
            list-style-type: none;
            padding: 0;
        }

        .card ul li {
            margin: 5px 0;
            font-weight: bold;
        }

        *.card ul li::before {
            content: "•";
            color: #b200b7;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
            padding: 10px 20px;
        }*

        .card button {
            background-color: #ffcc00;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            width: 100%;
            margin-top: 10px;
        }

        .card button:hover {
            background-color: #e6b800;
        }

        .middle-button { /* ปุ่มตรงกลาง */
            background-color: #ffccff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 20px;
            color: #000;
        }

        .middle-button:hover {
            background-color: #e6b3e6;
        }

        .arrow { /* ไอคอนลูกศร */
            position: absolute;
            top: 50%;
            left: 100%;
            transform: translate(-50%, -50%);
            font-size: 1.5em;
            color: #000;
        }
    .purple-button {
    background-color: #8a2be2; /* สีม่วง */
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s;
    }

.purple-button:hover {
    background-color: #7a1fbf; /* สีม่วงเข้มขึ้นเมื่อเอาเมาส์ไปชี้ */
}

  </style>
</head>
<body> 
    <div class="container">
        <h1>เลือกพรรคที่ต้องการโหวต</h1>
        <div class="card-container">
            <div class="card">
                <img alt="Group of people discussing in front of a computer" height="200" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnBfGEmVv--6pJ3kKba0SB8ptey_m0M568LQ&s" width="300"/>
                <h2>พรรค ผ่อน</h2>
                <ul>
                <li>วิสัยทัศน์</li>
                <p>ลดเวลาเรียน เพิ่มเวลารู้ เน้นการเรียนรู้แบบสนุกสนาน กิจกรรมนอกห้องเรียนสำคัญกว่า สอบปลายภาคแบบ open book (อาจมีข้อจำกัดบางวิชา)</p>
                </ul>
                <button onclick="window.location.href='score.php'">ลงคะแนน</button>
            </div>

            <div class="arrow">
                <i class="fas fa-arrow-right"></i>
            </div>

            <div class="card">
                <img alt="Group of people discussing in a meeting room" height="200" src="https://static.thairath.co.th/media/dFQROr7oWzulq5Fa6rHHU4JBKVXf2GaImkCkMnauvLscky3w2OCpl8YNXwceUtKyy71.jpg" width="300"/>
                <h2>พรรค ก่อน</h2>
                <ul>
                    <li>วิสัยทัศน์</li>
                    <p>เน้นการเรียนหนัก สอบยาก แต่ได้ความรู้แน่นปึ้ก ตัวชี้วัดทุกวิชา ประเมินการเรียนการสอนแบบเข้มข้น จัดกิจกรรมเสริมสร้างทักษะ ส่งเสริมการแข่งขันอย่างสร้างสรรค์</p>
                </ul>
                <button onclick="window.location.href='score.php'">ลงคะแนน</button>
            </div>
        </div>
        <button class="purple-button" onclick="window.location.href='score.php'">ไม่ประสงค์ลงคะแนน</button>
    </div>
</body>
</html>