<?php

class Poll {
    private $storageFile;

    public function __construct() {
        $this->storageFile = BASE_PATH . '/storage/polls.json';
        if (!file_exists($this->storageFile)) {
            if (!is_dir(dirname($this->storageFile))) mkdir(dirname($this->storageFile), 0777, true);
            file_put_contents($this->storageFile, json_encode([]));
        }
    }

    public function save($dados) {
        $polls = $this->getAll();
        $dados['votos'] = [];
        foreach ($dados['opcoes'] as $op) {
            $dados['votos'][$op] = 0;
        }
        array_unshift($polls, $dados);
        file_put_contents($this->storageFile, json_encode($polls));
    }

    public function registrarVoto($opcaoEscolhida) {
        $polls = $this->getAll();
        $atualizado = false;
        foreach ($polls as $index => $p) {
            if (in_array($opcaoEscolhida, $p['opcoes'])) {
                if (!isset($polls[$index]['votos'][$opcaoEscolhida])) {
                    $polls[$index]['votos'][$opcaoEscolhida] = 0;
                }
                $polls[$index]['votos'][$opcaoEscolhida]++;
                $atualizado = true;
                break; 
            }
        }
        if ($atualizado) file_put_contents($this->storageFile, json_encode($polls));
        return $atualizado;
    }

    // NOVO: Excluir uma enquete pelo ID
    public function delete($id) {
        $polls = $this->getAll();
        // Filtra o array removendo a enquete que tem esse ID
        $polls = array_filter($polls, function($p) use ($id) {
            return isset($p['id']) && $p['id'] !== $id;
        });
        // Salva novamente reorganizando os índices
        file_put_contents($this->storageFile, json_encode(array_values($polls)));
    }

// Atualizado: Agora recebe um termo de pesquisa
public function getPaginated($page = 1, $limit = 4, $search = '') {
    $allPolls = $this->getAll();

    // NOVO: Se o usuário digitou algo na busca, filtra as enquetes
    if (!empty($search)) {
        $search = mb_strtolower($search, 'UTF-8'); // Deixa tudo minúsculo para facilitar
        
        $allPolls = array_filter($allPolls, function($p) use ($search) {
            $nomeCampanha = mb_strtolower($p['nome_campanha'] ?? '', 'UTF-8');
            // Retorna true se a palavra pesquisada existir no nome da campanha
            return strpos($nomeCampanha, $search) !== false;
        });
    }

    $totalPolls = count($allPolls);
    $totalPages = ceil($totalPolls / $limit);
    $page = max(1, min($page, $totalPages > 0 ? $totalPages : 1));
    
    $offset = ($page - 1) * $limit;
    $pagedPolls = array_slice($allPolls, $offset, $limit);
    
    return [
        'data' => $pagedPolls,
        'total' => $totalPolls,
        'totalPages' => $totalPages,
        'currentPage' => $page
    ];
}

    public function getAll() {
        return json_decode(file_get_contents($this->storageFile), true) ?? [];
    }
}