<?php

require_once '../../DB/database.php';

class Produto{
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function insert($nome, $descricao, $estoque, $preco){
        $query = "INSERT INTO produtos (nome, descricao, estoque, preco) VALUES(:nome, :descricao, :estoque, :preco)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":estoque", $preco);
        $stmt->bindParam("preco", $preco);
        return $stmt->execute();
    }

    public function select(){
        $query = "SELECT * FROM produtos";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->FetchAll(PDO::FETCH_ASSOC);
    }

    public function searchForID($id){
        $query = "SELECT * FROM produtos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function delete($id){
        $query = "DELETE FROM produtos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
        
    }

    public function update($id, $nome, $descricao, $estoque, $preco){
        $query = "UPDATE produtos SET nome = :nome, descricao= :descricao, estoque= :estoque, preco= :preco WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":estoque", $estoque);
        $stmt->bindParam(":preco", $preco);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();

    }
}