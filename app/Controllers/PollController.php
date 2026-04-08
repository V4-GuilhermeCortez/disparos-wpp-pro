<?php
require_once BASE_PATH . '/app/Controllers/Controller.php'; 
require_once BASE_PATH . '/app/Services/WebhookService.php';
require_once BASE_PATH . '/app/Models/Poll.php'; 

class PollController extends Controller {
    private $webhookService;
    private $pollModel;

    public function __construct() {
        $this->webhookService = new WebhookService();
        $this->pollModel = new Poll();
    }

    public function index() {
        // Pega a página atual
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        
        // NOVO: Pega o termo de pesquisa (se houver)
        $search = $_GET['search'] ?? ''; 
        
        // Passa a página, o limite (4) e a pesquisa para o Model
        $resultado = $this->pollModel->getPaginated($page, 4, $search);
        
        $dados = [
            'titulo' => 'Enquetes | Disparos WPP',
            'sucesso' => isset($_GET['sucesso']) ? true : false,
            'enquetes' => $resultado['data'],
            'currentPage' => $resultado['currentPage'],
            'totalPages' => $resultado['totalPages'],
            'totalEnquetes' => $resultado['total'],
            'search' => $search // NOVO: Manda a palavra pesquisada de volta para a tela
        ];
        
        $this->view('home/poll', $dados);
    }

    public function send() {
        $nomeCampanha = $_POST['nome_campanha'] ?? 'Enquete Padrão';
        $pergunta = $_POST['pergunta'] ?? '';
        $opcoesRaw = $_POST['opcoes'] ?? [];
        
        $opcoes = array_values(array_filter($opcoesRaw, function($op) {
            return !empty(trim($op));
        }));

        $dadosEnquete = [
            'id' => uniqid(),
            'tipo' => 'enquete',
            'nome_campanha' => $nomeCampanha,
            'pergunta' => $pergunta,
            'opcoes' => $opcoes,
            'data_disparo' => date('Y-m-d H:i:s')
        ];

        $this->pollModel->save($dadosEnquete);
        $this->webhookService->enviarEnquete($dadosEnquete);

        header('Location: /?action=poll&sucesso=1');
        exit;
    }

    public function registerVote() {
        $input = json_decode(file_get_contents('php://input'), true);
        $opcaoVotada = $input['opcao_votada'] ?? null;
        
        if ($opcaoVotada) {
            $this->pollModel->registrarVoto($opcaoVotada);
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Voto computado com sucesso!']);
        } else {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Nenhuma opção recebida']);
        }
        exit;
    }

    // NOVO: Deleta a enquete e recarrega a página
    public function delete($id) {
        if ($id) {
            $this->pollModel->delete($id);
        }
        header('Location: /?action=poll');
        exit;
    }
}