<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alunos - Matrículas</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<div class="container">
    <h1>Lista de Alunos</h1>
    <a class="botao" href="AlunoController.php?action=novo">Novo Aluno</a>
    <a class="botao voltar" href="../index.php">Voltar ao Menu</a>
    <table class="tabela">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($alunos as $aluno): ?>
            <tr>
                <td><?= htmlspecialchars($aluno['id']) ?></td>
                <td><?= htmlspecialchars($aluno['nome']) ?></td>
                <td><?= htmlspecialchars($aluno['cpf']) ?></td>
                <td><?= htmlspecialchars($aluno['email']) ?></td>
                <td><?= date('d/m/Y', strtotime($aluno['data_nascimento'])) ?></td>
                <td>
                    <a href="AlunoController.php?action=editar&id=<?= $aluno['id'] ?>">Editar</a> |
                    <a href="AlunoController.php?action=excluir&id=<?= $aluno['id'] ?>" onclick="return confirm('Excluir este aluno?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
