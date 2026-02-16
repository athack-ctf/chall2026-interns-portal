<?php

class HomeController {
    public function index() {
        $title = "Home";
        $content = __DIR__ . '/../Views/home.php';
        require __DIR__ . '/../Views/layout.php';
    }
}