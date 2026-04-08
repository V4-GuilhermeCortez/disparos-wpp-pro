<?php

require_once BASE_PATH . '/app/Models/Campaign.php';
require_once BASE_PATH . '/app/Models/Disparo.php'; 
require_once BASE_PATH . '/app/Models/Poll.php';

class ReportService {
    private $campaignModel;
    private $disparoModel;
    private $pollModel;

    public function __construct() {
        $this->campaignModel = new Campaign();
        $this->disparoModel = new Disparo();
        $this->pollModel = new Poll();
    }

    // Função que levanta todos os dados do relatório
    public function getDadosCompletos() {
        $campanhas = $this->campaignModel->getAll();
        $enquetes = $this->pollModel->getAll();

        // 1. Pega os Contatos
        $statsFile = BASE_PATH . '/storage/stats.json';
        $stats = file_exists($statsFile) ? json_decode(file_get_contents($statsFile), true) : [];
        $totalContatos = $stats['contatos_cadastrados'] ?? 0;

        // 2. Pega o Histórico Total de Disparos
        $disparosFile = BASE_PATH . '/storage/disparos.json';
        $todosDisparos = file_exists($disparosFile) ? json_decode(file_get_contents($disparosFile), true) : [];
        $totalDisparos = count($todosDisparos);
        
        // 3. Calcula os Leads Alcançados
        $leadsAlcancados = $totalDisparos * $totalContatos;

        $valorTotalEstoque = 0;
        $totalItens = 0;
        $nomesCampanhas = [];
        $quantidadesEstoque = [];
        $valoresTotaisPorCampanha = [];

        foreach ($campanhas as $c) {
            $valorCampanha = $c['valor'] * $c['quantidade'];
            $valorTotalEstoque += $valorCampanha;
            $totalItens += $c['quantidade'];

            $nomesCampanhas[] = !empty($c['nome_campanha']) ? $c['nome_campanha'] : $c['nome'];
            $quantidadesEstoque[] = $c['quantidade'];
            $valoresTotaisPorCampanha[] = $valorCampanha;
        }

        // Retorna tudo empacotado para quem pediu
        return [
            'campanhas' => $campanhas,
            'totalCampanhas' => count($campanhas),
            'totalContatos' => $totalContatos,
            'totalDisparos' => $totalDisparos,
            'leadsAlcancados' => $leadsAlcancados,
            'valorTotalEstoque' => $valorTotalEstoque,
            'totalItens' => $totalItens,
            'js_nomes' => json_encode($nomesCampanhas),
            'js_quantidades' => json_encode($quantidadesEstoque),
            'js_valores' => json_encode($valoresTotaisPorCampanha),
            'enquetes' => $enquetes,
            'totalEnquetes' => count($enquetes)
        ];
    }

    // Função para zerar as estatísticas (Disparos e Contatos)
    public function resetarEstatisticas() {
        // 1. Zera contatos e disparos diários mantendo a estrutura do JSON
        $statsFile = BASE_PATH . '/storage/stats.json';
        $stats = file_exists($statsFile) ? json_decode(file_get_contents($statsFile), true) : [];
        
        // Zera os contadores específicos
        $stats['contatos_cadastrados'] = 0;
        $stats['disparos_hoje'] = 0; 
        
        // Salva novamente
        file_put_contents($statsFile, json_encode($stats));

        // 2. Esvazia o histórico completo de disparos
        $disparosFile = BASE_PATH . '/storage/disparos.json';
        file_put_contents($disparosFile, json_encode([]));
        
        return true;
    }
}