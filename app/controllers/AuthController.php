<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';
            $tipo = $_POST['tipo'] ?? 'cliente';
            $status_produtor = ($tipo === 'produtor') ? 'pendente' : null;

            $userModel = new User();
            $usuarioExistente = $userModel->findByEmail($email);

            if ($usuarioExistente) {
                $mensagem = "E-mail já cadastrado!";
                echo $mensagem;
                return;
            } else {
                $sucesso = $userModel->register($nome, $email, $senha, $tipo, $status_produtor);
                if ($sucesso) {
                    $_SESSION['mensagem_sucesso'] = "Usuário cadastrado com sucesso!";
                    header('Location: ?page=login');
                    exit;
                } else {
                    $mensagem = "Erro ao cadastrar usuário.";
                    echo $mensagem;
                    return;
                }
            }
        } else {
            // Exibe a view de cadastro
            include __DIR__ . '/../views/auth/cadastro.php';
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $userModel = new User();
            $usuario = $userModel->findByEmail($email);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['usuario_tipo'] = $usuario['tipo'];
                $_SESSION['status_produtor'] = $usuario['status_produtor'];

                // Se for produtor e não aprovado, bloqueia o acesso
                if ($usuario['tipo'] === 'produtor' && $usuario['status_produtor'] !== 'aprovado') {
                    $_SESSION['mensagem_erro'] = "Sua conta está aguardando aprovação. Assim que for aprovada, você poderá adicionar seus eventos.";
                    header('Location: ?page=eventos');
                    exit;
                }

                header('Location: index.php?page=eventos');
                exit;
            } else {
                echo "E-mail ou senha inválidos!";
            }
        } else {
            // Exibe a view de login
            include __DIR__ . '/../views/auth/login.php';
        }
    }
}