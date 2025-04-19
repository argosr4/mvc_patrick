<?php
require_once __DIR__ . '/../models/Matricula.php';
require_once __DIR__ . '/../models/Aluno.php';
require_once __DIR__ . '/../models/Curso.php';

$matriculaModel = new Matricula($pdo);
$alunoModel = new Aluno($pdo);
$cursoModel = new Curso($pdo);
$action = $_GET['action'] ?? 'listar';

switch ($action) {
    case 'listar':
        $matriculas = $matriculaModel->listar();
        include __DIR__ . '/../views/matriculas/listar.php';
        break;

    case 'nova':
        $alunos = $alunoModel->listar();
        $cursos = $cursoModel->listar();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $aluno_id = $_POST['aluno_id'] ?? '';
            $curso_id = $_POST['curso_id'] ?? '';
            $matriculaModel->inserir($aluno_id, $curso_id);
            header('Location: MatriculaController.php?action=listar');
            exit;
        }
        include __DIR__ . '/../views/matriculas/form.php';
        break;

    case 'excluir':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $matriculaModel->remover($id);
        }
        header('Location: MatriculaController.php?action=listar');
        exit;
        break;
}
