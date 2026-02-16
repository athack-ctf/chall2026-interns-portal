<?php

class AuthMiddleware {
    public static function handle($path) {
        if (strpos($path, '/admin') === 0) {
            if (!isset($_SESSION['user'])) {
                header('Location: /login');
                exit;
            }

            if (!$_SESSION['user']['is_admin']) {
                http_response_code(403);
                $content = __DIR__ . '/../Views/403.php';
                require __DIR__ . '/../Views/layout.php';
                exit;
            }
        }
    }
}