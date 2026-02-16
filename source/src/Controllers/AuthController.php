<?php

class AuthController {
    private function getDb() {
        $db = new PDO('sqlite:/var/www/html/data/app.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public function showLogin() {
        $title = "Login";
        $content = __DIR__ . '/../Views/login.php';
        $error = $_SESSION['login_error'] ?? null;
        unset($_SESSION['login_error']);
        require __DIR__ . '/../Views/layout.php';
    }

    public function doLogin() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $db = $this->getDb();
        $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'is_admin' => (bool)$user['is_admin']
            ];
            header('Location: /');
            exit;
        }

        $_SESSION['login_error'] = 'Invalid credentials';
        header('Location: /login');
        exit;
    }

    public function logout() {
        session_destroy();
        header('Location: /');
        exit;
    }
}