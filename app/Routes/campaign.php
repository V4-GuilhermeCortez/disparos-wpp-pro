<?php
require_once BASE_PATH . '/app/Controllers/CampaignController.php';
$controller = new CampaignController();

if ($action === 'store' && $method === 'POST') {
    $controller->store();
} elseif ($action === 'update' && $method === 'POST') {
    $controller->update();
} elseif ($action === 'delete' && isset($_GET['id'])) {
    $controller->delete($_GET['id']);
} elseif ($action === 'resend' && isset($_GET['id'])) {
    $controller->resend($_GET['id']);
} else {
    // Redireciona para o início caso acessem a rota de forma incorreta (ex: via GET em vez de POST)
    header('Location: /');
    exit;
}