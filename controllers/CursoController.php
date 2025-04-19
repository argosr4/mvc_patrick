<?php
require_once __DIR__ . '/../models/Curso.php';

$cursoModel = new Curso($pdo);
$action = $_GET['action'] ?? 'listar';

switch ($action) {
    case 'listar':
        $cursos = $cursoModel->listar();
        include __DIR__ . '/../views/cursos/listar.php';
        break;

    case 'novo':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $cursoModel->inserir($nome, $descricao);
            header('Location: CursoController.php?action=listar');
            exit;
        }
        include __DIR__ . '/../views/cursos/form.php';
        break;

    case 'editar':
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: CursoController.php?action=listar');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $descricao = $_POST['descricao'] ?? '';
            $cursoModel->atualizar($id, $nome, $descricao);
            header('Location: CursoController.php?action=listar');
            exit;
        }
        $curso = $cursoModel->buscarPorId($id);
        include __DIR__ . '/../views/cursos/form.php';
        break;

    case 'excluir':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $cursoModel->remover($id);
        }
        header('Location: CursoController.php?action=listar');
        exit;
        break;
}
