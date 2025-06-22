
<h1><?php echo isset($evento) ? 'Editar Evento' : 'Novo Evento'; ?></h1>
<form method="post" action="">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" id="titulo" value="<?php echo isset($evento) ? htmlspecialchars($evento['titulo']) : ''; ?>" required><br>

    <label for="descricao">Descrição:</label>
    <textarea name="descricao" id="descricao" required><?php echo isset($evento) ? htmlspecialchars($evento['descricao']) : ''; ?></textarea><br>

    <label for="cidade">Cidade:</label>
    <input type="text" name="cidade" id="cidade" value="<?php echo isset($evento) ? htmlspecialchars($evento['cidade']) : ''; ?>" required><br>

    <label for="data">Data:</label>
    <input type="date" name="data" id="data" value="<?php echo isset($evento) ? htmlspecialchars($evento['data']) : ''; ?>" required><br>

    <button type="submit">Salvar</button>
</form>