<div id="ผลการโหวต" class="tabcontent">
    <h3>ผลการลงคะแนนโหวต</h3>
    <canvas id="partyChart" width="400" height="200"></canvas>
    <div id="totalVotes" style="text-align: center; font-size: 18px; margin-top: 20px;"></div>
</div>

<script>
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
}
    function updateTotalVotes() { /*บอกคะแนนรวม*/
    const totalVotesDiv = document.getElementById('totalVotes');
    let totalVotesText = '<strong>คะแนนรวม:</strong><br>';

    for (const [party, score] of Object.entries(votes)) {
            totalVotesText += `${party}: ${score} คะแนน<br>`;
    }

    totalVotesDiv.innerHTML = totalVotesText;
    }
</script>