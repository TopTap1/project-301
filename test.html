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

        <!-- โมดอลสำหรับฟอร์มเข้าสู่ระบบ -->
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
    </div>

<!-- เลือกพรรค -->    
<div id="เลือกพรรค" class="tabcontent">
    <h3>เลือกพรรคที่ต้องการโหวต</h3>
    <div class="party-container">
        <div>
            <img src="party1.jpg" alt="พรรค 1" width="100" height="100">
            <h4>พรรค ผ่อน</h4>
            <p>นโยบาย</p>
            <p>ลดเวลาเรียน เพิ่มเวลาเที่ยว เน้นการเรียนรู้แบบสนุกสนาน กิจกรรมนอกห้องเรียนสำคัญกว่า สอบปลายภาคแบบ open book (อาจมีข้อจำกัดบางวิชา)</p>
            <button onclick="vote('พรรค 1')">โหวตพรรค 1</button>
        </div>
        <div>
            <img src="party2.jpg" alt="พรรค 2" width="100" height="100">
            <h4>พรรค ก่อน</h4>
            <p>นโยบาย</p>
            <p>เน้นการเรียนหนัก สอบยาก แต่ได้ความรู้แน่นปึ้ก ติวเข้มทุกวิชา มีระบบการเรียนการสอนแบบเข้มข้น ส่งเสริมการแข่งขันอย่างสร้างสรรค์</p>
            <button onclick="vote('พรรค 2')">โหวตพรรค 2</button>
        </div>
        <div>
            <button onclick="vote('ไม่ประสงค์ลงคะแนน')">ไม่ประสงค์ลงคะแนน</button>
        </div>
    </div>
</div>

<!-- ผลการโหวต -->
<div id="ผลการโหวต" class="tabcontent">
    <h3>ผลการลงคะแนนโหวต</h3>
    <canvas id="partyChart" width="400" height="200"></canvas>
    <div id="totalVotes" style="text-align: center; font-size: 18px; margin-top: 20px;"></div>
</div>

<!-- ผู้มาใช้สิทธิ์ -->
<div id="ผู้มาใช้สิทธิ์" class="tabcontent">
    <h3>ผู้มาใช้สิทธิแยกตามหลักสูตร</h3>
    <canvas id="courseChart" width="400" height="200"></canvas>
    <h3>ผู้มาใช้สิทธิแยกตามชั้นปี</h3>
    <canvas id="yearChart" width="400" height="200"></canvas>
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

    // ฟังก์ชันเปิดแท็บ
    function openTab(evt, tabName) {
        var tabcontent = document.getElementsByClassName("tabcontent");
        for (let i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        var tablinks = document.getElementsByClassName("tablinks");
        for (let i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabName).style.display = "block";
        if (evt) evt.currentTarget.className += " active";
    }

        // เปิดแท็บแรกโดยอัตโนมัติ
    document.getElementById("defaultOpen").click();

    var votes = {'พรรค 1': 0, 'พรรค 2': 0, 'ไม่ประสงค์ลงคะแนน': 0};
    var courses = {'บัญชี': 0, 'รัฐประศาสนศาสตร์': 0, 'การเงิน': 0, 'การตลาด': 0, 'การจัดการทรัพยากรมนุษย์': 0, 'ระบบสารสนเทศทางธุรกิจ': 0, 'การจัดการ (หลักสูตรนานาชาติ)': 0, 'การจัดการโลจิสติกส์': 0, 'การจัดการไมซ์': 0};
    var years = {'ปี 1': 0, 'ปี 2': 0, 'ปี 3': 0, 'ปี 4': 0, 'ปี 5': 0, 'ปี 6': 0, 'ปี 7': 0, 'ปี 8': 0};

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

    function vote(party) {
        votes[party]++;
        updateCharts();
        alert("โหวตสำเร็จ");
        openTab(event, 'ผลการโหวต');
    }

    function updateCharts() {
        new Chart(document.getElementById('partyChart'), {
            type: 'bar',
            data: {
                labels: Object.keys(votes),
                datasets: [{
                    label: 'คะแนนโหวตแต่ละพรรค',
                    data: Object.values(votes),
                    backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(75, 192, 192, 0.6)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)', 'rgba(75, 192, 192, 1)'],
                    borderWidth: 1
            }]
        },
        options: { scales: { y: { beginAtZero: true } } }
    });

        document.getElementById('totalVotes').innerHTML = Object.entries(votes).map(
            ([party, score]) => `<strong>${party}:</strong> ${score} คะแนน`
        ).join('<br>');

        function updateTotalVotes() { /*บอกคะแนนรวม*/
        const totalVotesDiv = document.getElementById('totalVotes');
        let totalVotesText = '<strong>คะแนนรวม:</strong><br>';

        for (const [party, score] of Object.entries(votes)) {
            totalVotesText += `${party}: ${score} คะแนน<br>`;
        }

        totalVotesDiv.innerHTML = totalVotesText;
        }

        function vote(party) { /*เรียกใช้ฟังก์ชัน updateTotalVotes() อัปเดตคะแนน */
            votes[party]++;
            updateCharts();
            updateTotalVotes();
            alert("โหวตสำเร็จ");
            openTab(event, 'ผลการโหวต');
        }


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
}

    document.getElementById("defaultOpen").click();
    </script>

</body>
</html>