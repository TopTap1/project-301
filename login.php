<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
<style>
@import url('https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');
body {
    font-family: 'Sarabun', sans-serif;
    background-color: #E0BBE4;
    margin: 0;
    padding: 0;
    color: #333;
    height: 100vh;
    display: flex;
    align-items: center; /* จัดกึ่งกลางแนวตั้ง */
    justify-content: center; /* จัดกึ่งกลางแนวนอน */
    text-align: center;
}

.modal-content {
    background-color: rgb(255, 255, 255);
    padding: 20px;
    border-radius: 10px;
    border: 2px solid #ab47bc; /* สีกรอบ */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* เงากรอบ */
    width: 100%;
    max-width: 500px;
    text-align: center;
}
.modal-content form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.modal-content input[type="text"],
.modal-content select {
    display: block;
    margin: 10px auto; /*ระยะห่าง*/
    padding: 15px; /*ความสูง*/
    width: 90%; /*ความกว้าง*/
    max-width: 400px; /*ความยาว*/
    border-radius: 5px;
    border: 1px solid #ccc;
    transition: border 0.3s ease;
}

/* ปรับสีเมื่อโฟกัส */
.modal-content input[type="text"]:focus,
.modal-content select:focus {
    border: 1px solid #ab47bc;
}

.modal-content button {
    background-color: #9858a3;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    width: 80%;
    max-width: 400px;
    border-radius: 5px;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.modal-content button:hover {
    background-color: #df46b1;
}
</style>
</head>

<body>
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" ></span>
        <h2>เข้าสู่ระบบ</h2>
        <form onsubmit="login(event)">
            <input type="text" id="name" placeholder="ชื่อ" required>
            <input type="text" id="studentID" placeholder="รหัสนักศึกษา" required>
            <select id="course" required>
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
            <select id="year" required>
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
            <br><button type="submit" class="login-btn">เข้าสู่ระบบ</button>
        </form>
    </div>
</div>

<script>
    // ฟังก์ชันเปิดโมดอล
    function openModal() {
        document.getElementById("loginModal").style.display = "flex";
    }

    // ฟังก์ชันปิดโมดอล
    function closeModal() {
        document.getElementById("loginModal").style.display = "none";
    }

    // ปิดโมดอลเมื่อคลิกนอกโมดอล
    window.onclick = function(event) {
        const modal = document.getElementById("loginModal");
        if (event.target === modal) {
            closeModal();
        }
    }

    function login(event) {
        event.preventDefault(); // หยุดการส่งฟอร์มปกติ
        var name = document.getElementById("name").value;
        var studentID = document.getElementById("studentID").value;
        var course = document.getElementById("course").value;
        var year = document.getElementById("year").value;
        if (name && studentID && course && year) {
            courses[course]++;
            years[year]++;
            closeModal();
            openTab(null, 'เลือกพรรค');
        } else {
            alert("กรุณากรอกข้อมูลให้ครบถ้วน");
        }
    }
</script>
</body>
</html>