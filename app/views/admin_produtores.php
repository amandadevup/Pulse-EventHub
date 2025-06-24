
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Aprovação de Produtores - Pulse</title>
    <link rel="stylesheet" href="/Pulse/public/style.css">
</head>
<body>
<div class="container">
    <h1>Produtores Pendentes</h1>
    <table>
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
                <a href="?page=aprovar_produtor&id=<?php echo $produtor['id']; ?>" class="button">Aprovar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>