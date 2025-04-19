<?php
require_once __DIR__ . '/../config/database.php';

class Matricula {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listar() {
        $sql = 'SELECT m.id, a.nome as aluno, c.nome as curso, m.data_matricula
                FROM matriculas m
                JOIN alunos a ON m.aluno_id = a.id
                JOIN cursos c ON m.curso_id = c.id
                ORDER BY m.data_matricula DESC';
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    public function buscarPorId($id) {
        $sql = 'SELECT * FROM matriculas WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function inserir($aluno_id, $curso_id) {
        $stmt = $this->pdo->prepare('INSERT INTO matriculas (aluno_id, curso_id) VALUES (?, ?)');
        return $stmt->execute([$aluno_id, $curso_id]);
    }

    public function remover($id) {
        $stmt = $this->pdo->prepare('DELETE FROM matriculas WHERE id=?');
        return $stmt->execute([$id]);
    }

    public function listarPorAluno($aluno_id) {
        $sql = 'SELECT m.id, c.nome as curso, m.data_matricula
                FROM matriculas m
                JOIN cursos c ON m.curso_id = c.id
                WHERE m.aluno_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$aluno_id]);
        return $stmt->fetchAll();
    }

    public function listarPorCurso($curso_id) {
        $sql = 'SELECT m.id, a.nome as aluno, m.data_matricula
                FROM matriculas m
                JOIN alunos a ON m.aluno_id = a.id
                WHERE m.curso_id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$curso_id]);
        return $stmt->fetchAll();
    }
}
