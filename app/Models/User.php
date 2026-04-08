<?php

class User {
    private $file;

    public function __construct() {
        $this->file = BASE_PATH . '/storage/users.json';
    }

    public function findByUsername($username) {
        $users = json_decode(file_get_contents($this->file), true) ?? [];
        foreach ($users as $user) {
            if ($user['username'] === $username) return $user;
        }
        return null;
    }

    public function authenticate($username, $password) {
        $user = $this->findByUsername($username);
        // password_verify compara a senha digitada com o hash do JSON
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}