<?php
require_once BASE_PATH . '/app/Controllers/Controller.php'; 
require_once BASE_PATH . '/app/Services/ReportService.php'; // Chama o cérebro

class ReportController extends Controller {
    private $reportService;

    public function __construct() {
        $this->reportService = new ReportService();
    }

    // Carrega a tela do Relatório
    public function index() {
        // Pede todos os dados já calculados para o Service
        $dados = $this->reportService->getDadosCompletos();
        
        // Adiciona informações da própria tela
        $dados['titulo'] = 'Relatório Geral | Disparos WPP';
        $dados['reset_sucesso'] = isset($_GET['reset']) && $_GET['reset'] == 1;

        // Renderiza a view
        $this->view('home/report', $dados);
    }

    // Acionado pelo botão de lixeira no cabeçalho
    public function resetStats() {
        // Pede pro Service zerar os arquivos
        $this->reportService->resetarEstatisticas();
        
        // Volta pra tela com aviso na URL
        header('Location: /?action=report&reset=1');
        exit;
    }
}