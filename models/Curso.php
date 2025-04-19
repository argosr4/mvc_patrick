<?php
require_once __DIR__ . '/../config/database.php';

class Curso {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $stmt = $this->pdo->query('SELECT * FROM cursos ORDER BY nome');
        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM cursos WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function inserir($nome, $descricao) {
        $stmt = $this->pdo->prepare('INSERT INTO cursos (nome, descricao) VALUES (?, ?)');
        return $stmt->execute([$nome, $descricao]);
    }

    public function atualizar($id, $nome, $descricao) {
        $stmt = $this->pdo->prepare('UPDATE cursos SET nome=?, descricao=? WHERE id=?');
        return $stmt->execute([$nome, $descricao, $id]);
    }

    public function remover($id) {
        $stmt = $this->pdo->prepare('DELETE FROM cursos WHERE id=?');
        return $stmt->execute([$id]);
    }
}
