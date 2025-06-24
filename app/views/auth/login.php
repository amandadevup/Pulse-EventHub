<?php 
if (isset($_SESSION['mensagem_sucesso'])): ?>
    <div class="mensagem-sucesso">
        <?php 
            echo $_SESSION['mensagem_sucesso']; 
            unset($_SESSION['mensagem_sucesso']);
        ?>
    </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Pulse</title>
    <link rel="stylesheet" href="/Pulse/public/style.css">
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <form method="post" action="">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>