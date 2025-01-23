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
    public function buscarPorId($id) {
        $query = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->model->conn->prepare($query); // Usa a conexão dentro do model
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(Cliente::class); // Retorna um objeto da classe Cliente
    }
    
    public function atualizar($id, $nome, $cpf, $email) {
        $query = "UPDATE clientes SET nome = :nome, cpf = :cpf, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
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
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
        if($query){
            echo "<script>excluido com sucesso!! </script>" ;
        }
    }

}
?>
