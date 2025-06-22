<?php
class AdminController {
    public function listarProdutoresPendentes() {
        $db = Database::getInstance()->getConnection();
        $pendentes = $db->query("SELECT * FROM usuarios WHERE tipo='produtor' AND status_produtor='pendente'")->fetchAll(PDO::FETCH_ASSOC);
        require __DIR__ . '/../views/admin_produtores.php';
    }

    public function aprovarProdutor() {
        $db = Database::getInstance()->getConnection();
        $id = $_GET['id'];
        $db->query("UPDATE usuarios SET status_produtor='aprovado' WHERE id=$id");
        header('Location: ?page=admin_produtores');
        exit;
    }
}