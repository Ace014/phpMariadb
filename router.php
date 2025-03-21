<?php
$request = trim($_SERVER['REQUEST_URI'], '/');

#catch for api calls
if (strpos($request, "api/") === 0) {
    require __DIR__ . "/$request";
    exit();
}

#card view page
if (preg_match("#^home/card/(\d+)$#", $request, $matches)) {
    $_GET['id'] = $matches[1];
    require './Pages/card_view.php';
    exit();
}

switch ($request) {
    case 'login':
        require './Pages/login_page.php';
        break;
    case 'register':
        require './Pages/register_page.php';
        break;
    case 'home':
        require './Pages/home_page.php';
        break;
    case 'admin':
        require './Pages/admin_page.php';
        break;
    case 'test':
        require 'api/status.php';
        break;
    default:
        header("Location: /register");
        require './Pages/register_page.php';
        break;
}
?>