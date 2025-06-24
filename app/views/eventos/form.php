<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($evento) ? 'Editar Evento' : 'Novo Evento'; ?> - Pulse</title>
    <link rel="stylesheet" href="/Pulse/public/style.css">
</head>
<body>
<div class="container">
    <h1><?php echo isset($evento) ? 'Editar Evento' : 'Novo Evento'; ?></h1>
    <form method="post" action="">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($evento['titulo'] ?? ''); ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required><?php echo htmlspecialchars($evento['descricao'] ?? ''); ?></textarea>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" value="<?php echo htmlspecialchars($evento['cidade'] ?? ''); ?>" required>

        <label for="data">Data:</label>
        <input type="date" name="data" id="data" value="<?php echo htmlspecialchars($evento['data_evento'] ?? ''); ?>" required>

        <button type="submit"><?php echo isset($evento) ? 'Salvar Alterações' : 'Criar Evento'; ?></button>
    </form>
</div>
</body>
</html>