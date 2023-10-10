var sampleChartClass;

(function ($) {
    $(document).ready(function () {
        var ctx = document.getElementById('myChart').getContext('2d');
        var pieChart = document.getElementById('myPieChart').getContext('2d');

        var totalFinanceiro = parseInt(document.getElementById('totalFinanceiro').textContent);
        var totalPorId = JSON.parse(document.getElementById('totalPorId').textContent);

        sampleChartClass.ChartData(ctx, 'bar', totalFinanceiro, totalPorId);
        sampleChartClass.ChartData(pieChart, 'pie', totalFinanceiro, totalPorId);
    });

    sampleChartClass = {
        ChartData: function (ctx, type, totalFinanceiro, totalPorId) {
            // Seu código de gráfico aqui usando as variáveis totalFinanceiro e totalPorId
            new Chart(ctx, {
                type: type,
                data: {
                    labels: totalPorId.map(function(item) { return 'Andar ' + item.floor; }), // Use os rótulos formatados aqui
                    datasets: [{
                        label: '# de Quartos por Andar',
                        data: totalPorId.map(function(item) { return item.total_quartos; }), // Use os dados formatados aqui
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    }
})(jQuery);