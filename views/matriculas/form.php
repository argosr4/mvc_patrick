<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Matrícula</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<div class="container">
    <h1>Nova Matrícula</h1>
    <form method="POST">
        <label>Aluno:<br>
            <select name="aluno_id" required style="width:95%;padding:7px;border-radius:4px;">
                <option value="">Selecione</option>
                <?php foreach($alunos as $aluno): ?>
                    <option value="<?= $aluno['id'] ?>"> <?= htmlspecialchars($aluno['nome']) ?> </option>
                <?php endforeach; ?>
            </select>
        </label><br><br>
        <label>Curso:<br>
            <select name="curso_id" required style="width:95%;padding:7px;border-radius:4px;">
                <option value="">Selecione</option>
                <?php foreach($cursos as $curso): ?>
                    <option value="<?= $curso['id'] ?>"> <?= htmlspecialchars($curso['nome']) ?> </option>
                <?php endforeach; ?>
            </select>
        </label><br><br>
        <button class="botao" type="submit">Salvar</button>
        <a class="botao voltar" href="MatriculaController.php?action=listar">Cancelar</a>
    </form>
</div>
</body>
</html>
