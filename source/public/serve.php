<?php
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

if ($uri !== '/' && file_exists(__DIR__ . $uri)) {
    return false;
}

if ($uri === '/index.php' || strpos($uri, '/index.php') === 0) {
    $pathInfo = substr($uri, strlen('/index.php'));
    if ($pathInfo !== false && $pathInfo !== '') {
        $_SERVER['PATH_INFO'] = $pathInfo;
    }
    require __DIR__ . '/index.php';
    return true;
}

if ($uri === '/' || $uri === '/login' || strpos($uri, '/logout') === 0 || 
    strpos($uri, '/users/') === 0 || strpos($uri, '/admin/') === 0) {
    $_SERVER['PATH_INFO'] = $uri;
    require __DIR__ . '/index.php';
    return true;
}

return false;