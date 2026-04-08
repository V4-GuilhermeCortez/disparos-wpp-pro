<?php
require_once BASE_PATH . '/app/Controllers/WebhookController.php';
$controller = new WebhookController();

if ($action === 'update_stats' && $method === 'POST') {
    $controller->updateStats();
} else {
    header('Location: /');
    exit;
}