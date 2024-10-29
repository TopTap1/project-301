<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผลการโหวต</title>
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
/* กราฟผลการโหวต */
canvas {
    width: 100% !important;
    height: auto !important;
    max-width: 600px;
    max-height: 400px;
    margin: 20px auto;
    display: block;
}
#totalVotes {
    background-color: #fff;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: center;
    font-size: 18px;
    margin-top: 20px;    
}

.tabcontent {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
</style> 
</head>
<body>  
<div id="ผลการโหวต" class="tabcontent">
    <h3>ผลการลงคะแนนโหวต</h3>
    <canvas id="partyChart" width="400" height="200"></canvas>
    <div id="totalVotes" style="text-align: center; font-size: 18px; margin-top: 20px;"></div>
</div>

<script>
        const votes = {
        'พรรค A': 10,
        'พรรค B': 20,
        'พรรค C': 30
    };
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

    updateTotalVotes();
}

   /* document.getElementById('totalVotes').innerHTML = Object.entries(votes).map(
        ([party, score]) => `<strong>${party}:</strong> ${score} คะแนน`
    ).join('<br>');    
}*/

    function updateTotalVotes() { /*บอกคะแนนรวม*/
    const totalVotesDiv = document.getElementById('totalVotes');
    let totalVotesText = '<strong>คะแนนรวม:</strong><br>';

    for (const [party, score] of Object.entries(votes)) {
            totalVotesText += `${party}: ${score} คะแนน<br>`;
    }

    totalVotesDiv.innerHTML = totalVotesText;
}
</script>
</body>
</html>