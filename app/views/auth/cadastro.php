
<h1>Cadastro de Usuário</h1>
<form method="post" action="">

    <label>Tipo de Conta:</label>
    <input type="radio" name="tipo" value="cliente" checked> Cliente
    <input type="radio" name="tipo" value="produtor"> Produtor
    <br>

    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" id="senha" required><br>

    <button type="submit">Cadastrar</button>
</form>
