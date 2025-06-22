<?php
session_start();
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$page = $_GET['page'] ?? 'login';

switch ($page) {
    case 'login':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        (new AuthController())->login();
        break;
    case 'cadastro':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        (new AuthController())->register();
        break;
    case 'eventos':
        require_once __DIR__ . '/../app/controllers/EventController.php';
        (new EventController())->list();
        break;
    case 'evento_criar':
        require_once __DIR__ . '/../app/controllers/EventController.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new EventController())->create();
        } else {
            (new EventController())->createForm();
        }
        break;
    case 'evento_editar':
        require_once __DIR__ . '/../app/controllers/EventController.php';
        $id = $_GET['id'] ?? null;
        if ($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                (new EventController())->update($id);
            } else {
                (new EventController())->editForm($id);
            }
        } else {
            echo 'ID do evento não informado!';
        }
        break;
    case 'evento_deletar':
        require_once __DIR__ . '/../app/controllers/EventController.php';
        $id = $_GET['id'] ?? null;
        if ($id) {
            (new EventController())->delete($id);
        } else {
            echo 'ID do evento não informado!';
        }
        break;
    // ...outros cases...
}
