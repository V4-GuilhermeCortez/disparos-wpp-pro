<?php
require_once BASE_PATH . '/app/Controllers/PollController.php';
$controller = new PollController();

if ($action === 'poll') {
    $controller->index();
} elseif ($action === 'send_poll' && $method === 'POST') {
    $controller->send();
} elseif ($action === 'register_vote' && $method === 'POST') {
    $controller->registerVote();
} elseif ($action === 'delete_poll' && isset($_GET['id'])) {
    $controller->delete($_GET['id']);
} else {
    header('Location: /');
    exit;
}