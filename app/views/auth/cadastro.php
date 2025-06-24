<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Pulse</title>
    <link rel="stylesheet" href="/Pulse/public/style.css">
</head>
<body>
<div class="container">
    <h1>Cadastro</h1>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>

        <label>Tipo de Conta:</label>
        <input type="radio" name="tipo" value="cliente" checked> Cliente
        <input type="radio" name="tipo" value="produtor"> Produtor

        <button type="submit">Cadastrar</button>
    </form>
</div>
</body>
</html>