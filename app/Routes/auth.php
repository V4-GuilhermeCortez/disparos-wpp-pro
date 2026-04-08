<?php
require_once BASE_PATH . '/app/Controllers/AuthController.php';
$controller = new AuthController();

if ($action === 'login') {
    $controller->showLogin();
} elseif ($action === 'auth' && $method === 'POST') {
    $controller->login();
} elseif ($action === 'logout') {
    $controller->logout();
}