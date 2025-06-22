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
                    <!-- Aqui vão os links para editar e deletar -->
                    <a href="?page=evento_editar&id=<?php echo $evento['id']; ?>">Editar</a> |
                    <a href="?page=evento_deletar&id=<?php echo $evento['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar?')">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5">Nenhum evento encontrado.</td></tr>
    <?php endif; ?>
</table>

<!-- Link para criar novo evento -->
<p><a href="?page=evento_criar">Novo Evento</a></p>