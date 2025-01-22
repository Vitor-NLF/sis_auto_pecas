<?php
require_once '../../DB/database.php';

class Cliente {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function buscarTodos() {
        $query = "SELECT * FROM clientes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cadastrar($nome, $cpf, $email) {
        $query = "INSERT INTO clientes (nome, cpf, email) VALUES (:nome, :cpf, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }

    public function excluir($id) {
        $query = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
        if($query){
            echo "<script>excluido com sucesso!! </script>" ;
        }
    }
}
?>
