<?php

class UserController {
    private function getDb() {
        $db = new PDO('sqlite:/var/www/html/data/app.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public function show($id) {
        $db = $this->getDb();
        $stmt = $db->prepare('SELECT id, username FROM users WHERE id = ?');
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            http_response_code(404);
            echo "User not found";
            return;
        }

        $title = "User Profile";
        $content = __DIR__ . '/../Views/user.php';
        require __DIR__ . '/../Views/layout.php';
    }
}