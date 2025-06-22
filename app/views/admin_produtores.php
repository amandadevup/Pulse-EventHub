<h1>Produtores Pendentes</h1>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Ação</th>
    </tr>
    <?php foreach ($pendentes as $produtor): ?>
    <tr>
        <td><?php echo htmlspecialchars($produtor['nome']); ?></td>
        <td><?php echo htmlspecialchars($produtor['email']); ?></td>
        <td>
            <a href="?page=aprovar_produtor&id=<?php echo $produtor['id']; ?>">Aprovar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>