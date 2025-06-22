<h1>Lista de Eventos</h1>

<!-- Formulário de filtro por cidade -->
<form method="get" action="">
    <input type="hidden" name="page" value="eventos">
    <label for="cidade">Filtrar por cidade:</label>
    <input type="text" name="cidade" id="cidade" value="<?php echo isset($_GET['cidade']) ? htmlspecialchars($_GET['cidade']) : ''; ?>">
    <button type="submit">Filtrar</button>
</form>

<!-- Tabela de eventos -->
<table border="1" cellpadding="5">
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
    <p><a href="?page=evento_criar">Novo Evento</a></p>
<?php endif; ?>
