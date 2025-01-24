<?php
require_once '../../DB/database.php';

class Cliente {
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function select(){   
        $query = "SELECT * FROM clientes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectForrelation(){
        $query = "SELECT servicos.id_cliente as Id, clientes.nome as Nome, clientes.cpf as CPF, clientes.email as Email
        FROM servicos JOIN clientes ON servicos.id_cliente = clientes.id";
        $stmt = $this->conn->prepare($query);
        $stmt->exxecute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchForID($id){
        $query = "SELECT * FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ); 
    }
    
    public function update($id, $nome, $cpf, $email){
        $query = "UPDATE clientes SET nome = :nome, cpf = :cpf, email = :email WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email); 
        return $stmt->execute();
    }
    
    public function insert($nome, $cpf, $email){
        $query = "INSERT INTO clientes (nome, cpf, email) VALUES (:nome, :cpf, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":cpf", $cpf);
        $stmt->bindParam(":email", $email);
        return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM clientes WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
?>
