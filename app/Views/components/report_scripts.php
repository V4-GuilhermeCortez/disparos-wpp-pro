<script>
    // Recebe os dados do PHP
    const nomes = <?= $js_nomes ?>;
    const quantidades = <?= $js_quantidades ?>;
    const valores = <?= $js_valores ?>;

    // Gráfico 1: Estoque (Barra)
    new Chart(document.getElementById('graficoEstoque'), {
        type: 'bar',
        data: {
            labels: nomes,
            datasets: [{
                label: 'Unidades',
                data: quantidades,
                backgroundColor: 'rgba(59, 130, 246, 0.6)', 
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                borderRadius: 4
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // Gráfico 2: Valores Totais (Doughnut/Rosca)
    new Chart(document.getElementById('graficoValor'), {
        type: 'doughnut',
        data: {
            labels: nomes,
            datasets: [{
                data: valores,
                backgroundColor: ['#10B981', '#3B82F6', '#F59E0B', '#8B5CF6', '#EF4444', '#14B8A6'],
                borderWidth: 1
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'right' } } }
    });

    // FUNÇÃO DE EXPORTAÇÃO PARA PDF
    function gerarPDF() {
        // Esconde o botão de baixar para ele não sair na foto do PDF
        document.getElementById('acoes-relatorio').style.display = 'none';

        const elemento = document.getElementById('folha-relatorio');
        
        const opcoes = {
            margin:       10,
            filename:     'Relatorio_Campanhas_WPP.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        // Gera o PDF e volta o botão para a tela
        html2pdf().set(opcoes).from(elemento).save().then(() => {
            document.getElementById('acoes-relatorio').style.display = 'block';
        });
    }
</script>