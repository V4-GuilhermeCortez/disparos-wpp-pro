<?php
require_once BASE_PATH . '/app/Controllers/Controller.php'; 
require_once BASE_PATH . '/app/Models/Campaign.php';
require_once BASE_PATH . '/app/Models/Disparo.php';

class HomeController extends Controller {
    private $campaignModel;
    private $disparoModel;

    public function __construct() {
        $this->campaignModel = new Campaign();
        $this->disparoModel = new Disparo();
    }

    public function index() {
        $search = $_GET['search'] ?? '';
        $page = max(1, (int)($_GET['page'] ?? 1));
        $filterDate = $_GET['filter_date'] ?? ''; 
        
        $resultado = $this->campaignModel->searchAndPaginate($search, $page, 4, $filterDate);

        // Estatísticas
        $statsFile = BASE_PATH . '/storage/stats.json';
        $stats = file_exists($statsFile) ? json_decode(file_get_contents($statsFile), true) : [];
        $totalContatos = $stats['contatos_cadastrados'] ?? 0;

        $dataParaEstatistica = !empty($filterDate) ? $filterDate : date('Y-m-d');
        $disparosHoje = $this->disparoModel->contarPorDia($dataParaEstatistica);

        // Cálculo de Leads Alcançados
        $leadsAlcancados = $disparosHoje * $totalContatos;

        $dados = [
            'titulo' => 'Dashboard | Disparos WPP',
            'status_conexao' => 'Conectado',
            'disparos_hoje' => $disparosHoje, 
            'contatos_cadastrados' => $totalContatos, 
            'leads_alcancados' => $leadsAlcancados,
            'campanhas' => $resultado['data'],
            'search' => $search,
            'data_filtro' => $filterDate,
            'currentPage' => $page,
            'totalPages' => $resultado['totalPages']
        ];

        $this->view('home/index', $dados);
    }
}