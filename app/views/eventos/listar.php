<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Eventos - Pulse</title>
    <link rel="stylesheet" href="/Pulse/public/style.css">
</head>
<body>
<div class="container">
    <?php if (isset($_SESSION['mensagem_erro'])): ?>
        <div class="mensagem-erro" style="margin-bottom:20px;">
            <?php 
                echo $_SESSION['mensagem_erro'];
                unset($_SESSION['mensagem_erro']);
            ?>
        </div>
    <?php endif; ?>
    <?php
    if (
        isset($_SESSION['usuario_tipo'], $_SESSION['status_produtor']) &&
        $_SESSION['usuario_tipo'] === 'produtor' &&
        $_SESSION['status_produtor'] !== 'aprovado'
    ): ?>
        <div class="mensagem-erro" style="margin-bottom:20px;">
            Sua conta está aguardando aprovação. Assim que for aprovada, você poderá adicionar seus eventos.
        </div>
    <?php endif; ?>
    <h1>Eventos</h1>
    <form method="get" action="" class="filtro-cidade">
        <input type="hidden" name="page" value="eventos">
        <label for="cidade">Filtrar por cidade:</label>
        <input type="text" name="cidade" id="cidade" value="<?php echo isset($_GET['cidade']) ? htmlspecialchars($_GET['cidade']) : ''; ?>">
        <button type="submit">Filtrar</button>
    </form>

    <table>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Cidade</th>
            <th>Data</th>
            <th>Ações</th>
        </tr>
        <?php if (!empty($eventos)): ?>
            <?php foreach ($eventos as $evento): ?>
                <tr>
                    <td><?php echo htmlspecialchars($evento['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($evento['descricao']); ?></td>
                    <td><?php echo htmlspecialchars($evento['cidade']); ?></td>
                    <td><?php echo htmlspecialchars($evento['data_evento']); ?></td>
                    <td>
                        <?php if (
                            isset($_SESSION['usuario_tipo'], $_SESSION['usuario_id']) &&
                            $_SESSION['usuario_tipo'] === 'produtor' &&
                            $_SESSION['status_produtor'] === 'aprovado' &&
                            $_SESSION['usuario_id'] == $evento['usuario_id']
                        ): ?>
                            <a href="?page=evento_editar&id=<?php echo $evento['id']; ?>">Editar</a> |
                            <a href="?page=evento_deletar&id=<?php echo $evento['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5">Nenhum evento encontrado.</td></tr>
        <?php endif; ?>
    </table>

    <?php if (
        isset($_SESSION['usuario_tipo']) &&
        $_SESSION['usuario_tipo'] === 'produtor' &&
        $_SESSION['status_produtor'] === 'aprovado'
    ): ?>
        <p><a href="?page=evento_criar" class="button">Novo Evento</a></p>
    <?php endif; ?>
</div>
</body>
</html>