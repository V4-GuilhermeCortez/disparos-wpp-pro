<?php

class WebhookController {
    
    public function updateStats() {
        $input = json_decode(file_get_contents('php://input'), true);
        $totalContatos = $input['total_contatos'] ?? $_POST['total_contatos'] ?? null;
        
        if ($totalContatos !== null) {
            $statsFile = BASE_PATH . '/storage/stats.json';
            $stats = file_exists($statsFile) ? json_decode(file_get_contents($statsFile), true) : [];
            $stats['contatos_cadastrados'] = (int)$totalContatos;
            file_put_contents($statsFile, json_encode($stats));
            
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'message' => 'Contatos atualizados com sucesso']);
        } else {
            http_response_code(400);
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Parâmetro total_contatos não encontrado']);
        }
        exit;
    }
    
}