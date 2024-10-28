<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
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