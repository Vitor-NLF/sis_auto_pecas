<?php

require_once '../../DB/database.php';


class Servico{
    private $conn;

    public function __construct(){
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function select(){
        $query = "SELECT clientes.nome AS Cliente, produtos.nome AS Produto, servicos.id AS Id, servicos.titulo_serv AS Servico, servicos.descricao AS Sobre, servicos.valor_serv AS Valor, servicos.data_inicio AS Inicio, servicos.data_fim AS Fim FROM clientes JOIN servicos ON clientes.id = servicos.id_cliente LEFT JOIN produtos ON produtos.id = servicos.id_produto";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->FetchAll(PDO::FETCH_ASSOC);
    }

    public function searchForID($id){
        $query = "SELECT clientes.nome AS Cliente, produtos.nome AS Produto, servicos.id as Id, servicos.titulo_serv AS Servico, servicos.descricao AS Sobre, servicos.valor_serv as Valor, servicos.data_inicio AS Inicio, servicos.data_fim AS Fim, servicos.id_cliente AS id_cliente, servicos.id_produto AS id_produto FROM clientes JOIN servicos ON clientes.id = servicos.id_cliente LEFT JOIN produtos ON produtos.id = servicos.id_produto WHERE servicos.id= :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id",$id, PDO::PARAM_INT);
        $stmt->execute();
         return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function insert($titulo_serv, $id_cliente, $descricao, $data_inicio, $data_fim, $valor_serv, $id_produto){
        $query = "INSERT INTO servicos(titulo_serv, id_cliente, descricao, data_inicio, data_fim, valor_serv, id_produto) VALUES(:titulo_serv, :id_cliente, :descricao, :data_inicio, :data_fim, :valor_serv, :id_produto)";
        $stmt = $this->conn->prepare($query);
        $id_produto = empty($id_produto) ? null : $id_produto;
        $stmt->bindParam(":titulo_serv", $titulo_serv);
        $stmt->bindParam(":id_cliente", $id_cliente);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":data_inicio", $data_inicio);
        $stmt->bindParam(":data_fim", $data_fim);
        $stmt->bindParam(":valor_serv", $valor_serv);
        if ($id_produto === null) {
            $stmt->bindValue(":id_produto", null, PDO::PARAM_NULL);
        } else {
            $stmt->bindParam(":id_produto", $id_produto);
        }
        return $stmt->execute();
    }


    public function delete($id){
        $query = "DELETE FROM servicos WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function update($id, $titulo_serv, $id_cliente, $descricao, $data_inicio, $data_fim, $valor_serv, $id_produto){
        $query = "UPDATE servicos SET titulo_serv = :titulo_serv, id_cliente= :id_cliente, descricao= :descricao, data_inicio= :data_inicio, data_fim= :data_fim, valor_serv= :valor_serv, id_produto= :id_produto WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $id_produto = empty($id_produto) ? null : $id_produto;
        $stmt->bindParam(":titulo_serv", $titulo_serv);
        $stmt->bindParam(":id_cliente", $id_cliente);
        $stmt->bindParam(":descricao", $descricao);
        $stmt->bindParam(":data_inicio", $data_inicio);
        $stmt->bindParam(":data_fim", $data_fim);
        $stmt->bindParam(":valor_serv", $valor_serv);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        if ($id_produto === null) {
            $stmt->bindValue(":id_produto", null, PDO::PARAM_NULL);
        } else {
            $stmt->bindParam(":id_produto", $id_produto);
        }
        return $stmt->execute();
    }
}      
