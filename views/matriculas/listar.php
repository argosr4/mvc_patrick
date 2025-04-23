<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Matrículas - Sistema</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<div class="container">
    <h1>Lista de Matrículas</h1>
    <a class="botao" href="MatriculaController.php?action=nova">Nova Matrícula</a>
    <a class="botao voltar" href="../index.php">Voltar ao Menu</a>
    <table class="tabela">
        <thead>
            <tr>
                <th>#</th>
                <th>Aluno</th>
                <th>Curso</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($matriculas as $m): ?>
            <tr>
                <td><?= htmlspecialchars($m['id']) ?></td>
                <td><?= htmlspecialchars($m['aluno']) ?></td>
                <td><?= htmlspecialchars($m['curso']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($m['data_matricula'])) ?></td>
                <td>
                    <a href="MatriculaController.php?action=excluir&id=<?= $m['id'] ?>" onclick="return confirm('Excluir esta matrícula?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
