<?php

require_once '../../DB/database.php';


class Servico{
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function select(){
        $query = "SELECT clientes.nome AS Cliente, servicos.id as Id, servicos.titulo_serv AS Servico, servicos.descricao AS Sobre, servicos.duracao_dias AS Duracao, servicos.valor_serv as Valor FROM clientes JOIN servicos ON clientes.id = servicos.id_cliente";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->FetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($titulo_serv, $id_cliente, $descricao, $duracao_dias, $valor_serv){
        $query = "INSERT INTO servicos(titulo_serv,id_cliente,descricao,duracao_dias,valor_serv) VALUES(:titulo_serv, :id_cliente, :descricao, :duracao_dias, :valor_serv)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":titulo_serv", $titulo_serv);
        $stmt->bindParam(":id_cliente", $id_cliente);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":duracao_dias", $duracao_dias);
        $stmt->bindParam(":valor_serv", $valor_serv);
        return $stmt->execute();
    }

    public function delete($id){
        $query = "DELETE FROM servicos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}      
