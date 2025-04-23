<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title><?= isset($aluno) ? 'Editar' : 'Novo' ?> Aluno</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>
<div class="container">
    <h1><?= isset($aluno) ? 'Editar' : 'Novo' ?> Aluno</h1>
    <form method="POST">
        <label>Nome:<br>
            <input type="text" name="nome" required maxlength="100" value="<?= isset($aluno) ? htmlspecialchars($aluno['nome']) : '' ?>">
        </label><br><br>
        <label>CPF:<br>
            <input type="text" name="cpf" required maxlength="20" value="<?= isset($aluno) ? htmlspecialchars($aluno['cpf']) : '' ?>">
        </label><br><br>
        <label>Email:<br>
            <input type="email" name="email" required maxlength="100" value="<?= isset($aluno) ? htmlspecialchars($aluno['email']) : '' ?>">
        </label><br><br>
        <label>Data de Nascimento:<br>
            <input type="date" name="data_nascimento" required value="<?= isset($aluno) ? htmlspecialchars($aluno['data_nascimento']) : '' ?>">
        </label><br><br>
        <button class="botao" type="submit">Salvar</button>
        <a class="botao voltar" href="AlunoController.php?action=listar">Cancelar</a>
    </form>
</div>
</body>
</html>
