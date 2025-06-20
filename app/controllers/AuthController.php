<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $senha = $_POST['senha'] ?? '';

            $userModel = new User();
            $usuarioExistente = $userModel->findByEmail($email);

            if ($usuarioExistente) {
                $mensagem = "E-mail já cadastrado!";
            } else {
                $sucesso = $userModel->register($nome, $email, $senha);
                $mensagem = $sucesso ? "Usuário cadastrado com sucesso!" : "Erro ao cadastrar usuário.";
            }

            echo $mensagem;
        } else {
            // Aqui você pode incluir sua view de cadastro se quiser
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
                header('Location: index.php?page=eventos');
                exit;
            } else {
                echo "E-mail ou senha inválidos!";
            }
        } else {
            // Aqui você pode incluir sua view de login se quiser
            include __DIR__ . '/../views/auth/login.php';
        }
    }
}
