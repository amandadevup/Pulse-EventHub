<?php
// Importa o model de eventos
require_once __DIR__ . '/../models/Event.php';

class EventController{
    // Lista todos os eventos, com opção de filtro por cidade
    public function list(){
        $eventModel = new Event();
        $cidade =isset($_GET['cidade']) ? $_GET['cidade'] : null;
        $eventos= $eventModel->list($cidade);

        require_once __DIR__ . '/../views/eventos/listar.php';

    }

    // Exibe o formulário para criar um novo evento
    public function createForm(){
        // Aqui vamos carregar a view do formulário de evento
        require_once __DIR__ . '/../views/eventos/form.php';
    }

    // Processa o formulário e salva um novo evento no banco
    public function create (){
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $cidade = $_POST['cidade'] ?? '';
            $data = $_POST['data'] ?? '';
            $usuario_id = 1; // Substitua pelo ID do usuário logado, se houver autenticação
    
            // Validação simples
            if ($titulo && $descricao && $cidade && $data) {
                $eventModel = new Event();
                $eventModel->create($titulo, $descricao, $cidade, $data, $usuario_id);
                header('Location: ?page=eventos');
                exit;
            } else {
                $erro = 'Preencha todos os campos!';
            }
        }
        // Se não for POST ou se houver erro, exibe o formulário novamente
        require __DIR__ . '/../views/eventos/form.php';
    }

    // Exibe o formulário para editar um evento existente
    public function editForm($id){
        $eventModel = new Event();
        $evento = $eventModel->findById($id);

        if (!$evento) {
            echo "Evento não encontrado!";
            return;
        }

        // Torna a variável $evento disponível na view
        require __DIR__ . '/../views/eventos/form.php';
    }

    // Processa o formulário e atualiza o evento no banco
    public function update($id){
        $eventModel = new Event();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $cidade = $_POST['cidade'] ?? '';
            $data = $_POST['data'] ?? '';
    
            if ($titulo && $descricao && $cidade && $data) {
                $eventModel->update($id, $titulo, $descricao, $cidade, $data);
                header('Location: ?page=eventos');
                exit;
            } else {
                $erro = 'Preencha todos os campos!';
                $evento = $eventModel->findById($id);
                require __DIR__ . '/../views/eventos/form.php';
            }
        } else {
            // Se não for POST, exibe o formulário preenchido
            $evento = $eventModel->findById($id);
            require __DIR__ . '/../views/eventos/form.php';
        }
    }    

    // Deleta um evento do banco de dados
    public function delete($id){
        $eventModel = new Event();
        $eventModel->delete($id);
        header('Location: ?page=eventos');
        exit;
    }
}
