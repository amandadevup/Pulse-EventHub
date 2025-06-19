<?php
// Roteador simples para MVC
require_once __DIR__ . '/config/config.php';

$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'login':
        require_once __DIR__ . '/app/controllers/AuthController.php';
        (new AuthController())->login();
        break;
    case 'cadastro':
        require_once __DIR__ . '/app/controllers/AuthController.php';
        (new AuthController())->register();
        break;
    case 'eventos':
        require_once __DIR__ . '/app/controllers/EventController.php';
        (new EventController())->list();
        break;
    case 'cadastrarEvento':
        require_once __DIR__ . '/app/controllers/EventController.php';
        (new EventController())->create();
        break;
    default:
        echo 'Página não encontrada.';
}
