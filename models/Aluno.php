<?php
require_once __DIR__ . '/../config/database.php';

class Aluno {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query('SELECT * FROM alunos ORDER BY nome');
        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM alunos WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function inserir($nome, $cpf, $email, $data_nascimento) {
        $stmt = $this->pdo->prepare('INSERT INTO alunos (nome, cpf, email, data_nascimento) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$nome, $cpf, $email, $data_nascimento]);
    }

    public function atualizar($id, $nome, $cpf, $email, $data_nascimento) {
        $stmt = $this->pdo->prepare('UPDATE alunos SET nome=?, cpf=?, email=?, data_nascimento=? WHERE id=?');
        return $stmt->execute([$nome, $cpf, $email, $data_nascimento, $id]);
    }

    public function remover($id) {
        $stmt = $this->pdo->prepare('DELETE FROM alunos WHERE id=?');
        return $stmt->execute([$id]);
    }
}
