<?php
require_once BASE_PATH . '/app/Controllers/ReportController.php';
$controller = new ReportController();

if ($action === 'report') {
    $controller->index();
} elseif ($action === 'reset_stats') {
    $controller->resetStats();
} else {
    header('Location: /');
    exit;
}