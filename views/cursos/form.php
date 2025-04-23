<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= isset($curso) ? 'Editar' : 'Novo' ?> Curso</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<div class="container">
    <h1><?= isset($curso) ? 'Editar' : 'Novo' ?> Curso</h1>
    <form method="POST">
        <label>Nome:<br>
            <input type="text" name="nome" required maxlength="100" value="<?= isset($curso) ? htmlspecialchars($curso['nome']) : '' ?>">
        </label><br><br>
        <label>Descrição:<br>
            <textarea name="descricao" maxlength="255" rows="3" style="width:95%;resize:vertical;"><?= isset($curso) ? htmlspecialchars($curso['descricao']) : '' ?></textarea>
        </label><br><br>
        <button class="botao" type="submit">Salvar</button>
        <a class="botao voltar" href="CursoController.php?action=listar">Cancelar</a>
    </form>
</div>
</body>
</html>
