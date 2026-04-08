<?php

class Controller {
    // Função protegida: todos os controllers que herdarem esta classe poderão usá-la
    protected function view($view, $dados = []) {
        extract($dados);
        $arquivo = BASE_PATH . '/app/Views/' . $view . '.php';
        
        if (file_exists($arquivo)) {
            require_once $arquivo;
        } else {
            die("Erro: A view {$view} não foi encontrada.");
        }
    }
}