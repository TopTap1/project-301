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

<script>
    var votes = {'พรรค 1': 0, 'พรรค 2': 0, 'ไม่ประสงค์ลงคะแนน': 0};

    function vote(party) { 
        votes[party]++;
        updateCharts();
        updateTotalVotes(); /*เรียกใช้ฟังก์ชัน updateTotalVotes() อัปเดตคะแนน */
        alert("โหวตสำเร็จ");
        openTab(event, 'ผลการโหวต');
    }
</script>