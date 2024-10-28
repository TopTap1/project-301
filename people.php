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

    document.getElementById("defaultOpen").click();
</script>