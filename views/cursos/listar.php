<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cursos - Matrículas</title>
    <link rel="stylesheet" href="../public/style.css">
    <style>
    .descricao-curta { display: inline; }
    .descricao-completa { display: none; }
    .ver-mais-btn { color: #3949ab; cursor: pointer; font-size: 14px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Lista de Cursos</h1>
    <a class="botao" href="CursoController.php?action=novo">Novo Curso</a>
    <a class="botao voltar" href="../index.php">Voltar ao Menu</a>
    <table class="tabela">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($cursos as $curso): ?>
            <tr>
                <td><?= htmlspecialchars($curso['id']) ?></td>
                <td><?= htmlspecialchars($curso['nome']) ?></td>
                <td>
                    <?php
                    $completa = htmlspecialchars($curso['descricao']);
                    if(mb_strlen($completa) > 40){
                        $curta = mb_substr($completa, 0, 40)."...";
                        $id = "desc-".$curso['id'];
                    ?>
                        <span class="descricao-curta" id="<?= $id ?>-curta"><?= $curta ?></span>
                        <span class="descricao-completa" id="<?= $id ?>-completa"><?= $completa ?></span>
                        <span class="ver-mais-btn" onclick="toggleDescricao('<?= $id ?>')" id="<?= $id ?>-btn">Ver mais</span>
                    <?php } else { echo $completa; } ?>
                </td>
                <td>
                    <a href="CursoController.php?action=editar&id=<?= $curso['id'] ?>">Editar</a> |
                    <a href="CursoController.php?action=excluir&id=<?= $curso['id'] ?>" onclick="return confirm('Excluir este curso?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
function toggleDescricao(id) {
  var curta = document.getElementById(id+'-curta');
  var completa = document.getElementById(id+'-completa');
  var btn = document.getElementById(id+'-btn');
  if(curta.style.display !== 'none') {
    curta.style.display = 'none';
    completa.style.display = 'inline';
    btn.textContent = 'Ver menos';
  } else {
    curta.style.display = 'inline';
    completa.style.display = 'none';
    btn.textContent = 'Ver mais';
  }
}
</script>
</body>
</html>
