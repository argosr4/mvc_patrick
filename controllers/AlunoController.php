<?php
require_once __DIR__ . '/../models/Aluno.php';

$alunoModel = new Aluno($pdo);
$action = $_GET['action'] ?? 'listar';

switch ($action) {
    case 'listar':
        $alunos = $alunoModel->listar();
        include __DIR__ . '/../views/alunos/listar.php';
        break;

    case 'novo':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $cpf = $_POST['cpf'] ?? '';
            $email = $_POST['email'] ?? '';
            $data_nascimento = $_POST['data_nascimento'] ?? '';
            $alunoModel->inserir($nome, $cpf, $email, $data_nascimento,);
            header('Location: AlunoController.php?action=listar');
            exit;
        }
        include __DIR__ . '/../views/alunos/form.php';
        break;

    case 'editar':
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: AlunoController.php?action=listar');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            $cpf = $_POST['cpf'] ?? '';
            $email = $_POST['email'] ?? '';
            $data_nascimento = $_POST['data_nascimento'] ?? '';
            $alunoModel->atualizar($id, $nome, $cpf, $email, $data_nascimento);
            header('Location: AlunoController.php?action=listar');
            exit;
        }
        $aluno = $alunoModel->buscarPorId($id);
        include __DIR__ . '/../views/alunos/form.php';
        break;

    case 'excluir':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $alunoModel->remover($id);
        }
        header('Location: AlunoController.php?action=listar');
        exit;
        break;
}
