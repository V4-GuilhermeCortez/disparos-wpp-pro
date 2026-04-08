<?php
require_once BASE_PATH . '/app/Controllers/Controller.php';
require_once BASE_PATH . '/app/Models/User.php';

class AuthController extends Controller {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function showLogin() {
        $this->view('auth/login', ['titulo' => 'Login | Disparos WPP']);
    }

    public function login() {
        $user = $_POST['username'] ?? '';
        $pass = $_POST['password'] ?? '';

        if ($this->userModel->authenticate($user, $pass)) {
            $_SESSION['usuario_id'] = $user;
            $_SESSION['usuario_nome'] = ucfirst($user);
            header('Location: /');
        } else {
            header('Location: /?action=login&erro=1');
        }
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: /?action=login');
        exit;
    }
}