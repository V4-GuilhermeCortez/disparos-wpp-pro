<?php

class WebhookService {
    private $webhookUrl;
    private $webhookPollUrl;

    public function __construct() {
        // O Webhook original (Campanhas com Imagem)
        $this->webhookUrl = 'https://n8n-n8n.gtrixb.easypanel.host/webhook-test/criakids';
        
        // NOVO: O Webhook para as Enquetes (Você pode mudar a URL depois se precisar)
        $this->webhookPollUrl = 'https://n8n-n8n.gtrixb.easypanel.host/webhook-test/enquetes';
    }

    // Função original de enviar Campanhas
    public function enviar($dados) {
        if (!empty($dados['foto'])) {
            $caminhoFisico = BASE_PATH . '/public/' . $dados['foto'];
            if (file_exists($caminhoFisico)) {
                $dadosArquivo = file_get_contents($caminhoFisico);
                $dados['foto_base64'] = base64_encode($dadosArquivo);
                $dados['foto_mime'] = mime_content_type($caminhoFisico);
            } else {
                $dados['foto_base64'] = ""; $dados['foto_mime'] = "";
            }
        } else {
            $dados['foto_base64'] = ""; $dados['foto_mime'] = "";
        }

        $ch = curl_init($this->webhookUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    // NOVO: Função super rápida só para enviar a Enquete pro n8n
    public function enviarEnquete($dados) {
        $ch = curl_init($this->webhookPollUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($dados));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}