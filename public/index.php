<?php

session_start(); // OBRIGATÓRIO PARA O LOGIN FUNCIONAR
date_default_timezone_set('America/Sao_Paulo');
define('BASE_PATH', dirname(__DIR__));

// 2. Segurança e Headers (Opcional, mas recomendado)
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");

// 3. Chama o arquivo que gerencia todas as Rotas
require_once BASE_PATH . '/app/routes.php';