<?php
require_once BASE_PATH . '/app/Controllers/HomeController.php';
$controller = new HomeController();

// Carrega a tela principal
$controller->index();