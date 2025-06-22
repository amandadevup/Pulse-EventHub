<?php
class Event {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Criar novo evento
    public function create($titulo, $descricao, $cidade, $data_evento, $usuario_id) {
        $sql = "INSERT INTO eventos (titulo, descricao, cidade, data_evento, usuario_id) VALUES (:titulo, :descricao, :cidade, :data_evento, :usuario_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':cidade' => $cidade,
            ':data_evento' => $data_evento,
            ':usuario_id' => $usuario_id
        ]);
    }

    // Listar eventos (opcionalmente filtrando por cidade)
    public function list($cidade = null) {
        if ($cidade) {
            $sql = "SELECT * FROM eventos WHERE cidade = :cidade ORDER BY data_evento DESC";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':cidade' => $cidade]);
        } else {
            $sql = "SELECT * FROM eventos ORDER BY data_evento DESC";
            $stmt = $this->db->query($sql);
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar evento por ID
    public function findById($id) {
        $sql = "SELECT * FROM eventos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Atualizar evento
    public function update($id, $titulo, $descricao, $cidade, $data_evento) {
        $sql = "UPDATE eventos SET titulo = :titulo, descricao = :descricao, cidade = :cidade, data_evento = :data_evento WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':titulo' => $titulo,
            ':descricao' => $descricao,
            ':cidade' => $cidade,
            ':data_evento' => $data_evento,
            ':id' => $id
        ]);
    }

    // Deletar evento
    public function delete($id) {
        $sql = "DELETE FROM eventos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
