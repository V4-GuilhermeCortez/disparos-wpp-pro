<?php
require_once BASE_PATH . '/app/Controllers/Controller.php';
require_once BASE_PATH . '/app/Models/Campaign.php';
require_once BASE_PATH . '/app/Models/Disparo.php';
require_once BASE_PATH . '/app/Services/WebhookService.php';

class CampaignController extends Controller {
    private $campaignModel;
    private $disparoModel;
    private $webhookService;

    public function __construct() {
        $this->campaignModel = new Campaign();
        $this->disparoModel = new Disparo();
        $this->webhookService = new WebhookService();
    }

    public function store() {
        $nomeCampanha = $_POST['nome_campanha'] ?? '';
        $nome = $_POST['nome'] ?? '';
        $quantidade = (int)($_POST['quantidade'] ?? 0);
        $descricao = $_POST['descricao'] ?? '';
        $valor = (float)($_POST['valor'] ?? 0);
        $fotoPath = '';

        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = BASE_PATH . '/public/uploads/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            $fileName = time() . '_' . basename($_FILES['foto']['name']);
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . $fileName)) {
                $fotoPath = 'uploads/' . $fileName; 
            }
        }

        $novaCampanha = [
            'id' => uniqid(),
            'nome_campanha' => $nomeCampanha,
            'nome' => $nome,
            'quantidade' => $quantidade,
            'descricao' => $descricao,
            'valor' => $valor,
            'foto' => $fotoPath,
            'data_criacao' => date('Y-m-d H:i:s')
        ];

        $this->campaignModel->save($novaCampanha);
        $this->webhookService->enviar($novaCampanha);
        $this->disparoModel->registrar();

        header('Location: /');
        exit;
    }

    public function update() {
        $id = $_POST['id'] ?? null;
        $campanhaAntiga = $this->campaignModel->find($id);

        if ($id && $campanhaAntiga) {
            $fotoPath = $campanhaAntiga['foto']; 
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                $uploadDir = BASE_PATH . '/public/uploads/';
                $fileName = time() . '_' . basename($_FILES['foto']['name']);
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadDir . $fileName)) {
                    if (!empty($fotoPath) && file_exists(BASE_PATH . '/public/' . $fotoPath)) unlink(BASE_PATH . '/public/' . $fotoPath);
                    $fotoPath = 'uploads/' . $fileName;
                }
            }
            $dadosAtualizados = [
                'nome_campanha' => $_POST['nome_campanha'], 'nome' => $_POST['nome'],
                'quantidade' => (int)$_POST['quantidade'], 'descricao' => $_POST['descricao'],
                'valor' => (float)$_POST['valor'], 'foto' => $fotoPath
            ];
            $this->campaignModel->update($id, $dadosAtualizados);
        }
        header('Location: /');
        exit;
    }

    public function resend($id) {
        $campanha = $this->campaignModel->find($id);
        if ($campanha) {
            $this->webhookService->enviar($campanha);
            $this->disparoModel->registrar();
        }
        header('Location: /');
        exit;
    }

    public function delete($id) {
        $campanha = $this->campaignModel->find($id);
        if ($campanha) {
            if (!empty($campanha['foto']) && file_exists(BASE_PATH . '/public/' . $campanha['foto'])) unlink(BASE_PATH . '/public/' . $campanha['foto']); 
            $this->campaignModel->delete($id);
        }
        header('Location: /');
        exit;
    }
}