const ctx = document.getElementById('graph1').getContext('2d');
const graph1 = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Bom', 'Ruim', 'Ótimo'],
        datasets: [{
            label: 'Satisfação',
            data: [30, 5, 55],
            backgroundColor: [
                'rgb(255, 30, 90)',
                'rgb(255, 10, 111)',
                'rgb(255, 232, 255)'
            ]
        }]
    },
    options: {
        responsive: true, // Essa opção garante que o gráfico se ajuste ao tamanho da tela
        maintainAspectRatio: false,
    }
});