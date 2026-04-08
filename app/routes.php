<?php

// Captura a ação da URL e o método (GET ou POST)
$action = $_GET['action'] ?? 'index';
$method = $_SERVER['REQUEST_METHOD'];

// ==========================================
// 🔒 GATEKEEPER (SISTEMA DE SEGURANÇA)
// ==========================================
// Se o usuário NÃO estiver logado e tentar acessar algo diferente da tela de login ou da ação de logar...
if (!isset($_SESSION['usuario_id']) && $action !== 'login' && $action !== 'auth') {
    // Expulsa ele de volta para a tela de login!
    header('Location: /?action=login');
    exit;
}

// ==========================================
// 🗺️ MAPEAMENTO DE ROTAS (O DICIONÁRIO)
// ==========================================
// 'acao_da_url' => 'arquivo_responsavel'
$routeMap = [
    
    // Módulo de Autenticação (Login/Logout)
    'login'  => 'auth',
    'auth'   => 'auth',
    'logout' => 'auth',

    // Módulo de Campanhas
    'store'   => 'campaign',
    'update'  => 'campaign',
    'delete'  => 'campaign',
    'resend'  => 'campaign',
    
    // Módulo de Relatórios
    'report'      => 'report',
    'reset_stats' => 'report', 
    
    // Módulo de Integrações / Webhooks
    'update_stats' => 'webhook',
    
    // Módulo de Enquetes
    'poll'          => 'poll',
    'send_poll'     => 'poll',
    'register_vote' => 'poll',
    'delete_poll'   => 'poll',
    
    // Dashboard / Home
    'index' => 'home'
];

// Verifica de quem é a responsabilidade dessa rota
// Se o usuário digitar uma ação que não existe, ele manda para o 'home' por segurança
$routeFile = $routeMap[$action] ?? 'home';

// Chama o arquivo de rotas específico do módulo
require_once BASE_PATH . "/app/Routes/{$routeFile}.php";