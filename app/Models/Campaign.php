<?php

class Campaign {
    private $storageFile;

    public function __construct() {
        $this->storageFile = BASE_PATH . '/storage/campaigns.json';
        if (!file_exists($this->storageFile)) {
            if (!is_dir(dirname($this->storageFile))) mkdir(dirname($this->storageFile), 0777, true);
            file_put_contents($this->storageFile, json_encode([]));
        }
    }

    public function getAll() {
        return json_decode(file_get_contents($this->storageFile), true) ?? [];
    }

    // ATUALIZADO: Agora recebe a Data do Filtro
    public function searchAndPaginate($search = '', $page = 1, $limit = 4, $filterDate = '') {
        $campanhas = $this->getAll();

        if (!empty($search)) {
            $search = strtolower($search);
            $campanhas = array_filter($campanhas, function($c) use ($search) {
                return strpos(strtolower($c['nome']), $search) !== false || 
                       strpos(strtolower($c['nome_campanha'] ?? ''), $search) !== false;
            });
        }

        // Filtra pela Data Escolhida
        if (!empty($filterDate)) {
            $campanhas = array_filter($campanhas, function($c) use ($filterDate) {
                return isset($c['data_criacao']) && strpos($c['data_criacao'], $filterDate) === 0;
            });
        }

        $total = count($campanhas);
        $totalPages = ceil($total / $limit);
        $offset = ($page - 1) * $limit;
        $dadosPaginados = array_slice($campanhas, $offset, $limit);

        return [
            'data' => $dadosPaginados,
            'total' => $total,
            'totalPages' => $totalPages > 0 ? $totalPages : 1
        ];
    }

    public function find($id) { foreach ($this->getAll() as $campanha) { if ($campanha['id'] === $id) return $campanha; } return null; }
    public function save($dados) { $campanhas = $this->getAll(); array_unshift($campanhas, $dados); file_put_contents($this->storageFile, json_encode($campanhas)); }
    public function update($id, $dadosAtualizados) {
        $campanhas = $this->getAll();
        foreach ($campanhas as $index => $c) {
            if ($c['id'] === $id) {
                $campanhas[$index] = array_merge($c, $dadosAtualizados);
                file_put_contents($this->storageFile, json_encode($campanhas)); return true;
            }
        } return false;
    }
    public function delete($id) {
        $campanhas = $this->getAll();
        foreach ($campanhas as $index => $c) {
            if ($c['id'] === $id) {
                unset($campanhas[$index]);
                file_put_contents($this->storageFile, json_encode(array_values($campanhas))); return true;
            }
        } return false;
    }
}